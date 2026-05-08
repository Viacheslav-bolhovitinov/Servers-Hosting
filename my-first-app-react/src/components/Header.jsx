import { Link } from 'react-router-dom';
import './Header.css';

function Header() {
  return (
    <header className="header">
      <div className="header__logo">
        <span className="header__logo-icon">⚡</span>
        <Link to="/" className="header__logo-text">GameHost Pro</Link>
      </div>
      <nav className="header__nav">
        <Link to="/" className="header__nav-link">Головна</Link>
        <Link to="/catalog" className="header__nav-link">Каталог</Link>
        <Link to="/#about" className="header__nav-link">Про нас</Link>
        <Link to="/contacts" className="header__nav-link">Контакти</Link>
      </nav>
    </header>
  );
}

export default Header;
