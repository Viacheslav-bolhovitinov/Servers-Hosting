import { useState, useEffect } from 'react';
import Header from './components/Header';
import Main from './components/Main';
import ServerList from './components/ServerList';
import Footer from './components/Footer';
import PromoBanner from './components/PromoBanner';
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
    <div className="app">
      <PromoBanner />
      <Header />
      <Main />
      <ServerList />
      <Footer />
    </div>
  );
}

export default App;
