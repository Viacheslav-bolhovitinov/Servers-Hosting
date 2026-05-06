import './Header.css';

function Header() {
  return (
    <header className="header">
      <div className="header__logo">
        <span className="header__logo-icon">⚡</span>
        <span className="header__logo-text">GameHost Pro</span>
      </div>
      <nav className="header__nav">
        <a href="#home" className="header__nav-link">Головна</a>
        <a href="#catalog" className="header__nav-link">Каталог</a>
        <a href="#about" className="header__nav-link">Про нас</a>
      </nav>
    </header>
  );
}

export default Header;
