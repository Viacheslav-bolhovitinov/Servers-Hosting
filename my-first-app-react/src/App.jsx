import Header from './components/Header';
import Main from './components/Main';
import ServerList from './components/ServerList';
import Footer from './components/Footer';
import './App.css';

function App() {
  return (
    <div className="app">
      <Header />
      <Main />
      <ServerList />
      <Footer />
    </div>
  );
}

export default App;
