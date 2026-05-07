import { useState, useEffect } from 'react';

function PromoBanner() {
  const [timeLeft, setTimeLeft] = useState(3600);

  useEffect(() => {
    const interval = setInterval(() => {
      setTimeLeft((prev) => {
        if (prev <= 1) {
          clearInterval(interval);
          return 0;
        }
        return prev - 1;
      });
    }, 1000);

    return () => clearInterval(interval);
  }, []);

  function formatTime(seconds) {
    const hours = String(Math.floor(seconds / 3600)).padStart(2, '0');
    const minutes = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
    const secs = String(seconds % 60).padStart(2, '0');
    return `${hours}:${minutes}:${secs}`;
  }

  return (
    <div className="promo-banner">
      <span className="promo-banner__text">🔥 ЗНИЖКА 30% НА ВСІ СЕРВЕРИ!</span>
      <span className="promo-banner__timer">
        {timeLeft > 0 ? `⏳ Акція закінчується через: ${formatTime(timeLeft)}` : '⏰ Акція завершена'}
      </span>
    </div>
  );
}

export default PromoBanner;
