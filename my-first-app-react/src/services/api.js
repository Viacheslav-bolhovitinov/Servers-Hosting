import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
  },
});

export const getServers = (game = 'all') => {
  const params = game !== 'all' ? { game } : {};
  return api.get('/servers', { params });
};

export const getGames = () => api.get('/games');
export const getCategories = () => api.get('/categories');

export const getServer = (id) => api.get(`/servers/${id}`);

export default api;
