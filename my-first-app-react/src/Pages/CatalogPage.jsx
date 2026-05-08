import ServerList from '../components/ServerList';

function CatalogPage() {
  return (
    <div className="catalog-page">
      <div className="catalog-page__hero">
        <h1 className="catalog-page__title">Каталог серверів</h1>
        <p className="catalog-page__subtitle">
          Оберіть сервер, вкажіть кількість годин та забронюйте миттєво
        </p>
      </div>
      <ServerList />
    </div>
  );
}

export default CatalogPage;
