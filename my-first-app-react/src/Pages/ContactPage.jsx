import { useState } from 'react';

function ContactPage() {
  const [form, setForm] = useState({
    name: '',
    email: '',
    message: '',
  });

  const [errors, setErrors] = useState({
    name: '',
    email: '',
    message: '',
  });

  const [submitted, setSubmitted] = useState(false);

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm((prev) => ({ ...prev, [name]: value }));
    setErrors((prev) => ({ ...prev, [name]: '' }));
  };

  const validate = () => {
    const newErrors = { name: '', email: '', message: '' };
    let isValid = true;

    if (form.name.trim().length < 2) {
      newErrors.name = "Ім'я має містити щонайменше 2 символи";
      isValid = false;
    }

    if (!form.email.includes('@')) {
      newErrors.email = 'Email має містити символ "@"';
      isValid = false;
    }

    if (form.message.trim().length < 10) {
      newErrors.message = 'Повідомлення не може бути коротшим за 10 символів';
      isValid = false;
    }

    setErrors(newErrors);
    return isValid;
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (validate()) {
      setSubmitted(true);
      setForm({ name: '', email: '', message: '' });
      setErrors({ name: '', email: '', message: '' });
    }
  };

  return (
    <div className="contact-page">
      <div className="contact-page__hero">
        <h1 className="contact-page__title">Зв'язатися з нами</h1>
        <p className="contact-page__subtitle">
          Маєте питання або пропозиції? Напишіть нам — відповімо протягом 24 годин
        </p>
      </div>

      <div className="contact-page__content">
        <div className="contact-page__info">
          <h2 className="contact-info__title">Наші контакти</h2>

          <div className="contact-info__item">
            <span className="contact-info__icon">📧</span>
            <div>
              <span className="contact-info__label">Email підтримки</span>
              <span className="contact-info__value">support@gamehost.pro</span>
            </div>
          </div>

          <div className="contact-info__item">
            <span className="contact-info__icon">💬</span>
            <div>
              <span className="contact-info__label">Discord</span>
              <span className="contact-info__value">discord.gg/gamehost</span>
            </div>
          </div>

          <div className="contact-info__item">
            <span className="contact-info__icon">⏰</span>
            <div>
              <span className="contact-info__label">Підтримка працює</span>
              <span className="contact-info__value">24/7 без вихідних</span>
            </div>
          </div>

          <div className="contact-info__item">
            <span className="contact-info__icon">🎮</span>
            <div>
              <span className="contact-info__label">Telegram бот</span>
              <span className="contact-info__value">@gamehost_support</span>
            </div>
          </div>
        </div>

        <div className="contact-page__form-wrap">
          {submitted ? (
            <div className="contact-form__success">
              <span className="contact-form__success-icon">✅</span>
              <h3>Повідомлення надіслано!</h3>
              <p>Дякуємо за звернення. Ми зв'яжемося з вами найближчим часом.</p>
              <button
                className="btn btn--primary"
                onClick={() => setSubmitted(false)}
              >
                Надіслати ще одне
              </button>
            </div>
          ) : (
            <form className="contact-form" onSubmit={handleSubmit} noValidate>
              <h2 className="contact-form__title">Форма зворотного зв'язку</h2>

              <div className="contact-form__group">
                <label className="contact-form__label" htmlFor="name">
                  Ім'я <span className="contact-form__required">*</span>
                </label>
                <input
                  className={`contact-form__input ${errors.name ? 'contact-form__input--error' : ''}`}
                  type="text"
                  id="name"
                  name="name"
                  value={form.name}
                  onChange={handleChange}
                  placeholder="Введіть ваше ім'я"
                  autoComplete="off"
                />
                {errors.name && (
                  <span className="contact-form__error">{errors.name}</span>
                )}
              </div>

              <div className="contact-form__group">
                <label className="contact-form__label" htmlFor="email">
                  Email <span className="contact-form__required">*</span>
                </label>
                <input
                  className={`contact-form__input ${errors.email ? 'contact-form__input--error' : ''}`}
                  type="email"
                  id="email"
                  name="email"
                  value={form.email}
                  onChange={handleChange}
                  placeholder="your@email.com"
                  autoComplete="off"
                />
                {errors.email && (
                  <span className="contact-form__error">{errors.email}</span>
                )}
              </div>

              <div className="contact-form__group">
                <label className="contact-form__label" htmlFor="message">
                  Повідомлення <span className="contact-form__required">*</span>
                </label>
                <textarea
                  className={`contact-form__textarea ${errors.message ? 'contact-form__input--error' : ''}`}
                  id="message"
                  name="message"
                  value={form.message}
                  onChange={handleChange}
                  placeholder="Опишіть ваше питання або проблему..."
                  rows={5}
                />
                <div className="contact-form__counter">
                  <span className={form.message.length < 10 ? 'contact-form__counter--warn' : 'contact-form__counter--ok'}>
                    {form.message.length} символів
                    {form.message.length < 10 ? ' (мінімум 10)' : ' ✓'}
                  </span>
                </div>
                {errors.message && (
                  <span className="contact-form__error">{errors.message}</span>
                )}
              </div>

              <button type="submit" className="btn btn--primary contact-form__submit">
                Надіслати повідомлення
              </button>
            </form>
          )}
        </div>
      </div>
    </div>
  );
}

export default ContactPage;
