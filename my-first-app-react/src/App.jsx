import { useState, useEffect } from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Header from './components/Header';
import Footer from './components/Footer';
import PromoBanner from './components/PromoBanner';
import HomePage from './pages/HomePage';
import CatalogPage from './pages/CatalogPage';
import ServerDetails from './pages/ServerDetails';
import ContactPage from './pages/ContactPage';
import './App.css';

function App() {
  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    const timer = setTimeout(() => {
      setIsLoading(false);
    }, 2000);

    return () => clearTimeout(timer);
  }, []);

  if (isLoading) {
    return (
      <div className="spinner-overlay">
        <div className="spinner"></div>
        <p className="spinner-text">Завантаження серверів...</p>
      </div>
    );
  }

  return (
    <BrowserRouter>
      <div className="app app-layout">
        <PromoBanner />
        <Header />
        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/catalog" element={<CatalogPage />} />
          <Route path="/server/:id" element={<ServerDetails />} />
          <Route path="/contacts" element={<ContactPage />} />
        </Routes>
        <Footer />
      </div>
    </BrowserRouter>
  );
}

export default App;
