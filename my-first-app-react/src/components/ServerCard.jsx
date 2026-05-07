import { useState, useEffect } from 'react';

function ServerCard({ name, game, slots, price, status, description, icon }) {
  const [hours, setHours] = useState(() => {
    const saved = localStorage.getItem(`server_hours_${name.replace(/ /g, '_')}`);
    return saved ? parseInt(saved, 10) : 1;
  });
  const [booked, setBooked] = useState(false);

  useEffect(() => {
    localStorage.setItem(`server_hours_${name.replace(/ /g, '_')}`, hours);
  }, [hours, name]);

  const increase = () => setHours((prev) => prev + 1);
  const decrease = () => setHours((prev) => (prev > 1 ? prev - 1 : 1));

  const handleBook = () => {
    if (status !== 'active') return;
    setBooked(true);
    setTimeout(() => setBooked(false), 2500);
  };

  const totalPrice = price * hours;

  return (
    <div className={`server-card ${status !== 'active' ? 'server-card--offline' : ''}`}>
      <div className="server-card__header">
        <span className="server-card__icon">{icon}</span>
        <div>
          <h3 className="server-card__name">{name}</h3>
          <span className="server-card__game">{game}</span>
        </div>
        <span
          className={`server-card__status ${
            status === 'active'
              ? 'server-card__status--online'
              : 'server-card__status--offline'
          }`}
        >
          {status === 'active' ? '● Онлайн' : '● Офлайн'}
        </span>
      </div>

      <p className="server-card__description">{description}</p>

      <div className="server-card__meta">
        <span>👥 {slots} гравців</span>
        <span>💰 {price} грн/год</span>
      </div>

      <div className="server-card__counter">
        <span className="server-card__counter-label">Кількість годин:</span>
        <div className="server-card__counter-controls">
          <button className="server-card__counter-btn" onClick={decrease}>
            −
          </button>
          <span className="server-card__counter-value">{hours}</span>
          <button className="server-card__counter-btn" onClick={increase}>
            +
          </button>
        </div>
      </div>

      <div className="server-card__total">
        Разом: <strong>{totalPrice} грн</strong>
      </div>

      <button
        className={`server-card__book-btn ${booked ? 'server-card__book-btn--success' : ''}`}
        onClick={handleBook}
        disabled={status !== 'active'}
      >
        {booked ? '✅ Заброньовано!' : status === 'active' ? 'Забронювати' : 'Недоступно'}
      </button>
    </div>
  );
}

export default ServerCard;

