<style>
.exchange-card {
  border-radius: 14px;
  padding: 18px 18px 12px;
  font-family: "Segoe UI", Tahoma, sans-serif;
}

.exchange-header {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 6px;
}

.exchange-header h4 {
  margin: 0;
  font-size: 18px;
  color: #ff1493;
  font-weight: 600;
}

.exchange-header img {
  width: 42px;
}

.exchange-meta {
  font-size: 13px;
  color: #0099cc;
  margin-bottom: 10px;
}

.exchange-meta a {
  color: #138496;
  font-weight: 500;
  margin-left: 6px;
  text-decoration: none;
}

.exchange-meta a:hover {
  text-decoration: underline;
}

.currency-table th {
  background: #f4fbfd;
  font-size: 13px;
  text-align: center;
}

.currency-table td {
  font-size: 13px;
  text-align: center;
  padding: 6px;
}

.currency-table .title-row td {
  background: #138496;
  color: #fff;
  font-weight: 600;
  text-align: center;
}

.exchange-footer {
  text-align: right;
  margin-top: 8px;
}

.exchange-footer a {
  color: #138496;
  font-size: 13px;
  text-decoration: none;
  font-weight: 500;
}

.exchange-footer a:hover {
  text-decoration: underline;
}
</style>
<div class="container">
<div class="col-md-4 col-sm-12" style="margin-top: 5px;">
  <div class="exchange-card">

    <div class="exchange-header">
      <img src="https://jb.com.bd/assets/images/others/ex-rate.png" alt="ex-rate">
      <h4>Exchange Rate</h4>
    </div>

    <!-- <div class="exchange-meta">
      as on 30th December - 2025
      <a target="_blank" href="https://jb.com.bd/assets/file/ExchangeRate/1936_Rate_30-12-2025.pdf">
        <i class="fa fa-mouse-pointer"></i> View Full List <i class="fa fa-angle-right"></i>
      </a>
    </div> -->

    <div class="currency">
      <table class="table table-sm table-bordered currency-table">
        <thead>
          <tr>
            <th>Currency</th>
            <th>Selling Rate</th>
            <th>Buying Rate</th>
          </tr>
        </thead>
        <tbody>
          <tr class="title-row"><td colspan="3">JANATA BANK PLC. CASH</td></tr>
          <tr><td>USD</td><td>123.0000</td><td>122.0000</td></tr>
          <tr><td>EURO</td><td>143.00</td><td>138.00</td></tr>
          <tr><td>GBP</td><td>165.00</td><td>159.00</td></tr>
          <tr><td>AUD</td><td>80.0000</td><td>76.0000</td></tr>
        </tbody>
      </table>
    </div>

    <!-- <div class="exchange-footer">
      <a target="_blank" href="https://jb.com.bd/international_trade/exchange-rate">
        View Previous List <i class="fa fa-angle-right"></i>
      </a>
    </div> -->

  </div>
</div>
</div>
