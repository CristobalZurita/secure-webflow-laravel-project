import React, { useState } from 'react';

function LoginForm() {
  const [phone, setPhone] = useState('');
  const [error, setError] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    if (phone === '') {
      setError('El campo de teléfono no puede estar vacío');
      return;
    } else if (!/^\d+$/.test(phone)) {
      setError('El campo de teléfono solo puede contener números');
      return;
    }
    setError('');
    // Procesar el formulario aquí
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <div>
          <label htmlFor="phone">Teléfono:</label>
          <input
            type="text"
            id="phone"
            value={phone}
            onChange={(e) => setPhone(e.target.value)}
          />
        </div>
        {error && <p style={{ color: 'red' }}>{error}</p>}
        <button type="submit">Enviar</button>
      </form>
    </div>
  );
}

export default LoginForm;
