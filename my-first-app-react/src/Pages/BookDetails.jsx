import { useParams, Link } from 'react-router-dom';
import servers from '../data/servers';

function BookDetails() {
  const { id } = useParams();
  const server = servers.find((item) => item.id === parseInt(id, 10));

  if (!server) {
    return (
      <div className="server-details server-details--not-found">
        <h2>❌ Сервер не знайдено</h2>
        <p>Сервер з ID «{id}» не існує.</p>
        <Link to="/catalog" className="btn btn--primary">← Повернутись до каталогу</Link>
      </div>
    );
  }

  return (
    <div className="server-details">
      <div className="server-details__back">
        <Link to="/catalog" className="server-details__back-link">← Назад до каталогу</Link>
      </div>

      <div className="server-details__card">
        <div className="server-details__header">
          <span className="server-details__icon">{server.icon}</span>
          <div>
            <h1 className="server-details__name">{server.name}</h1>
            <span className="server-details__game">{server.game}</span>
          </div>
          <span className={`server-details__status ${server.status === 'active' ? 'server-details__status--online' : 'server-details__status--offline'}`}>
            {server.status === 'active' ? '● Онлайн' : '● Офлайн'}
          </span>
        </div>

        <p className="server-details__description">{server.description}</p>

        <div className="server-details__info-grid">
          <div className="server-details__info-item">
            <span className="server-details__info-label">IP адреса</span>
            <span className="server-details__info-value">{server.ip}</span>
          </div>
          <div className="server-details__info-item">
            <span className="server-details__info-label">Слоти</span>
            <span className="server-details__info-value">👥 {server.slots} гравців</span>
          </div>
          <div className="server-details__info-item">
            <span className="server-details__info-label">Ціна</span>
            <span className="server-details__info-value">💰 {server.price} грн/год</span>
          </div>
          <div className="server-details__info-item">
            <span className="server-details__info-label">Статус</span>
            <span className="server-details__info-value">
              {server.status === 'active' ? '✅ Доступний' : '🔴 Недоступний'}
            </span>
          </div>
        </div>

        {server.status === 'active' && (
          <Link to="/catalog" className="btn btn--primary server-details__cta">
            Забронювати цей сервер
          </Link>
        )}
      </div>
    </div>
  );
}

export default BookDetails;
