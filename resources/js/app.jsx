import React, { useState, useEffect } from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Routes, Route, Link, useParams } from 'react-router-dom';
import axios from 'axios';
import './bootstrap';
import '../css/app.css';

const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL || 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
  },
});

function Header() {
  return (
    <header className="py-6 bg-slate-900 text-white">
      <div className="mx-auto max-w-5xl px-4 flex flex-wrap items-center justify-between gap-4">
        <div className="text-xl font-bold">GameHost Pro</div>
        <nav className="flex gap-4">
          <Link className="hover:text-sky-300" to="/">Home</Link>
          <Link className="hover:text-sky-300" to="/catalog">Catalog</Link>
          <Link className="hover:text-sky-300" to="/contacts">Contacts</Link>
        </nav>
      </div>
    </header>
  );
}

function Footer() {
  return (
    <footer className="py-6 bg-slate-950 text-slate-400">
      <div className="mx-auto max-w-5xl px-4 text-sm text-center">
        © {new Date().getFullYear()} GameHost Pro — Local preview with Laravel API.
      </div>
    </footer>
  );
}

function HomePage() {
  return (
    <section className="py-12">
      <div className="mx-auto max-w-5xl px-4">
        <h1 className="text-4xl font-bold mb-4">GameHost Pro</h1>
        <p className="text-slate-700 mb-6">Browse game servers and book your next session with the Laravel API backend.</p>
        <div className="flex flex-wrap gap-3">
          <Link className="rounded bg-sky-600 px-4 py-2 text-white" to="/catalog">Browse Catalog</Link>
          <Link className="rounded border border-slate-300 px-4 py-2 text-slate-900" to="/contacts">Contact Support</Link>
        </div>
      </div>
    </section>
  );
}

function CatalogPage() {
  const [servers, setServers] = useState([]);
  const [games, setGames] = useState([]);
  const [selectedGame, setSelectedGame] = useState('all');
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState('');

  useEffect(() => {
    setLoading(true);
    Promise.all([
      api.get('/games'),
      api.get('/servers', { params: { game: selectedGame } }),
    ])
      .then(([gamesRes, serversRes]) => {
        setGames(gamesRes.data);
        setServers(serversRes.data);
        setError('');
      })
      .catch(() => {
        setError('Failed to load catalog data.');
      })
      .finally(() => setLoading(false));
  }, [selectedGame]);

  return (
    <section className="py-12">
      <div className="mx-auto max-w-5xl px-4">
        <h2 className="text-3xl font-semibold mb-4">Catalog</h2>
        <div className="mb-6 flex flex-wrap gap-3">
          <button onClick={() => setSelectedGame('all')} className={`rounded px-3 py-2 ${selectedGame === 'all' ? 'bg-sky-600 text-white' : 'bg-slate-200'}`}>
            All Games
          </button>
          {games.map((game) => (
            <button key={game} onClick={() => setSelectedGame(game)} className={`rounded px-3 py-2 ${selectedGame === game ? 'bg-sky-600 text-white' : 'bg-slate-200'}`}>
              {game}
            </button>
          ))}
        </div>

        {loading && <p>Loading servers...</p>}
        {error && <p className="text-red-600">{error}</p>}

        {!loading && !error && (
          <div className="grid gap-4 md:grid-cols-2">
            {servers.length === 0 ? (
              <p>No servers found for {selectedGame}.</p>
            ) : (
              servers.map((server) => (
                <div key={server.id} className="rounded border border-slate-200 p-4 shadow-sm">
                  <h3 className="text-xl font-semibold mb-2">{server.name}</h3>
                  <p className="text-sm text-slate-600 mb-2">Game: {server.game}</p>
                  <p className="text-sm text-slate-600 mb-2">Status: {server.status}</p>
                  <p className="text-sm text-slate-600 mb-2">Slots: {server.slots}</p>
                  <Link className="text-sky-600 hover:underline" to={`/server/${server.id}`}>View details</Link>
                </div>
              ))
            )}
          </div>
        )}
      </div>
    </section>
  );
}

function ServerDetails() {
  const { id } = useParams();
  const [server, setServer] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState('');

  useEffect(() => {
    api.get(`/servers/${id}`)
      .then((response) => setServer(response.data))
      .catch(() => setError('Server not found.'))
      .finally(() => setLoading(false));
  }, [id]);

  if (loading) {
    return <p className="p-4">Loading server details...</p>;
  }

  if (error) {
    return <p className="p-4 text-red-600">{error}</p>;
  }

  return (
    <section className="py-12">
      <div className="mx-auto max-w-5xl px-4">
        <h2 className="text-3xl font-semibold mb-4">{server.name}</h2>
        <p className="text-slate-600 mb-2">Game: {server.game}</p>
        <p className="text-slate-600 mb-2">IP: {server.ip}</p>
        <p className="text-slate-600 mb-2">Status: {server.status}</p>
        <p className="text-slate-600 mb-2">Slots: {server.slots}</p>
        <p className="text-slate-600 mb-4">{server.description}</p>
        <Link className="rounded bg-sky-600 px-4 py-2 text-white" to="/catalog">Back to Catalog</Link>
      </div>
    </section>
  );
}

function ContactPage() {
  const [message, setMessage] = useState('');
  const [response, setResponse] = useState(null);
  const [error, setError] = useState(null);

  const handleSubmit = (event) => {
    event.preventDefault();
    setResponse(null);
    setError(null);

    api.post('/servers/store', {})
      .then((res) => {
        setResponse('Form submitted successfully.');
      })
      .catch((err) => {
        setError(err.response?.status ? `API error ${err.response.status}` : 'Network error');
      });
  };

  return (
    <section className="py-12">
      <div className="mx-auto max-w-5xl px-4">
        <h2 className="text-3xl font-semibold mb-4">Contacts</h2>
        <p className="mb-6 text-slate-600">Submit the form to trigger an API response and verify production mode behavior.</p>
        <form onSubmit={handleSubmit} className="space-y-4">
          <div>
            <label className="block mb-1">Message</label>
            <textarea className="w-full rounded border px-3 py-2" rows="4" value={message} onChange={(e) => setMessage(e.target.value)} />
          </div>
          <button type="submit" className="rounded bg-sky-600 px-4 py-2 text-white">Send</button>
        </form>
        {response && <p className="mt-4 text-green-600">{response}</p>}
        {error && <p className="mt-4 text-red-600">{error}</p>}
      </div>
    </section>
  );
}

function AppShell() {
  return (
    <BrowserRouter>
      <div className="min-h-screen bg-slate-50 text-slate-900">
        <Header />
        <main className="app-main">
          <Routes>
            <Route path="/" element={<HomePage />} />
            <Route path="/catalog" element={<CatalogPage />} />
            <Route path="/server/:id" element={<ServerDetails />} />
            <Route path="/contacts" element={<ContactPage />} />
          </Routes>
        </main>
        <Footer />
      </div>
    </BrowserRouter>
  );
}

const rootElement = document.getElementById('react-app') || document.getElementById('app');
if (rootElement) {
  createRoot(rootElement).render(<AppShell />);
}
