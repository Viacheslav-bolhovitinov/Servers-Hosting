import { useState, useEffect } from 'react';
import { getServers, getCategories } from '../services/api';
import ServerCard from '../components/ServerCard';

function CatalogPage() {
  const [servers, setServers] = useState([]);
  const [categories, setCategories] = useState([]);
  const [selectedGame, setSelectedGame] = useState('all');
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    getCategories()
      .then((res) => setCategories(res.data))
      .catch(() => setCategories([]));
  }, []);

  useEffect(() => {
    setLoading(true);
    setError(null);

    getServers(selectedGame)
      .then((res) => {
        setServers(res.data);
        setLoading(false);
      })
      .catch(() => {
        setError('Не вдалося завантажити сервери. Перевірте підключення.');
        setLoading(false);
      });
  }, [selectedGame]);

  return (
    <div className="catalog-page">
      <div className="catalog-page__hero">
        <h1 className="catalog-page__title">Каталог серверів</h1>
        <p className="catalog-page__subtitle">
          Оберіть сервер, вкажіть кількість годин та забронюйте миттєво
        </p>
      </div>

      <div className="catalog-filter">
        <button
          className={`catalog-filter__btn ${selectedGame === 'all' ? 'catalog-filter__btn--active' : ''}`}
          onClick={() => setSelectedGame('all')}
        >
          🎮 Всі ігри
        </button>
        {categories.map((game) => (
          <button
            key={game}
            className={`catalog-filter__btn ${selectedGame === game ? 'catalog-filter__btn--active' : ''}`}
            onClick={() => setSelectedGame(game)}
          >
            {game}
          </button>
        ))}
      </div>

      {loading && (
        <div className="catalog-page__loading">
          <div className="catalog-page__spinner"></div>
          <p>Завантаження серверів...</p>
        </div>
      )}

      {error && (
        <div className="catalog-page__error">
          <span>⚠️ {error}</span>
        </div>
      )}

      {!loading && !error && (
        <>
          {servers.length === 0 ? (
            <div className="catalog-page__empty">
              <p>😕 Серверів для гри «{selectedGame}» не знайдено</p>
            </div>
          ) : (
            <div className="server-list__grid" style={{ maxWidth: '1200px', margin: '0 auto', padding: '0 40px 80px' }}>
              {servers.map((server) => (
                <ServerCard
                  key={server.id}
                  id={server.id}
                  name={server.name}
                  game={server.game}
                  slots={server.slots}
                  price={server.price}
                  status={server.status}
                  description={server.description}
                  icon={server.icon || '🖥️'}
                />
              ))}
            </div>
          )}
        </>
      )}
    </div>
  );
}

export default CatalogPage;
