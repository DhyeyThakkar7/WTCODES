import React, { useState } from 'react';
import './App.css';

function App() {
  const [amount, setAmount] = useState('');
  const [convertedAmount, setConvertedAmount] = useState(null);
  const exchangeRate = 74.50; // Example exchange rate (1 USD to INR)

  const handleConvert = (event) => {
    event.preventDefault();
    const amountInDollars = parseFloat(amount);
    if (amountInDollars > 0) {
      const result = amountInDollars * exchangeRate;
      setConvertedAmount(result);
    } else {
      alert('Please enter a positive amount.');
    }
  };

  return (
    <div className="App">
      <header className="App-header">
        <h1>Currency Converter</h1>
        <form onSubmit={handleConvert}>
          <label>
            Amount in Dollars:
            <input
              type="number"
              value={amount}
              onChange={(e) => setAmount(e.target.value)}
              required
            />
          </label>
          <button type="submit">Convert</button>
        </form>
        {convertedAmount !== null && (
          <h2>Converted Amount: ₹{convertedAmount.toFixed(2)}</h2>
        )}
      </header>
    </div>
  );
}

export default App;
