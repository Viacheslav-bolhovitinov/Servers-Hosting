import './Main.css';

function Main() {
  return (
    <main className="main" id="home">
      <section className="hero">
        <div className="hero__badge">🎮 Найкращі ігрові сервери</div>
        <h1 className="hero__title">
          Бронюй сервер.<br />
          <span className="hero__title--accent">Грай без меж.</span>
        </h1>
        <p className="hero__subtitle">
          Швидкі та стабільні ігрові сервери для CS2, Rust, Minecraft та інших ігор.
          Оренда від 1 години — без складних налаштувань.
        </p>
        <div className="hero__buttons">
          <a href="#catalog" className="btn btn--primary">Переглянути каталог</a>
          <a href="#about" className="btn btn--outline">Дізнатися більше</a>
        </div>
      </section>

      <section className="features" id="about">
        <h2 className="features__title">Чому обирають нас?</h2>
        <div className="features__grid">
          <div className="features__card">
            <span className="features__card-icon">⚡</span>
            <h3>Миттєвий старт</h3>
            <p>Сервер запускається за 30 секунд після оплати</p>
          </div>
          <div className="features__card">
            <span className="features__card-icon">🛡️</span>
            <h3>DDoS захист</h3>
            <p>Захист від атак включено в кожен тарифний план</p>
          </div>
          <div className="features__card">
            <span className="features__card-icon">🎮</span>
            <h3>Популярні ігри</h3>
            <p>CS2, Rust, Minecraft, Valheim та багато інших</p>
          </div>
          <div className="features__card">
            <span className="features__card-icon">💬</span>
            <h3>Підтримка 24/7</h3>
            <p>Наша команда завжди готова допомогти</p>
          </div>
        </div>
      </section>
    </main>
  );
}

export default Main;
