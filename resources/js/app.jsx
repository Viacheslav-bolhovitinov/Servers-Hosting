import React from 'react';
import { createRoot } from 'react-dom/client';
import './bootstrap';
import '../css/app.css';
import Header from './components/Header';
import Main from './components/Main';
import Footer from './components/Footer';

function App() {
    return (
        <div className="min-h-screen bg-slate-50 text-slate-900">
            <div className="mx-auto max-w-5xl px-4 py-8">
                <Header />
                <Main />
                <Footer />
            </div>
        </div>
    );
}

const container = document.getElementById('app');
if (container) {
    createRoot(container).render(<App />);
}
