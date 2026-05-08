import ServerCard from './ServerCard';
import servers from '../data/servers';

function ServerList() {
  return (
    <section className="server-list" id="catalog">
      <div className="server-list__grid">
        {servers.map((server) => (
          <ServerCard
            key={server.id}
            id={server.id}
            name={server.name}
            game={server.game}
            slots={server.slots}
            price={server.price}
            status={server.status}
            description={server.description}
            icon={server.icon}
          />
        ))}
      </div>
    </section>
  );
}

export default ServerList;
