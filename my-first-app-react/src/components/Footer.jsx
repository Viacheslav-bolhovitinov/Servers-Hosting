import './Footer.css';

function Footer() {
  return (
    <footer className="footer">
      <div className="footer__content">
        <span className="footer__logo">⚡ GameHost Pro</span>
        <p className="footer__copy">
          © 2026 GameHost Pro. Система бронювання ігрових серверів.
        </p>
        <div className="footer__links">
          <a href="#home" className="footer__link">Головна</a>
          <a href="#catalog" className="footer__link">Каталог</a>
          <a href="#about" className="footer__link">Про нас</a>
        </div>
      </div>
    </footer>
  );
}

export default Footer;
