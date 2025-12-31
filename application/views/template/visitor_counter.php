<style>
.visitor-wrap {
  max-width: 360px;
  margin: 30px auto;
  background: linear-gradient(135deg, #138496, #4dd5ff);
  border-radius: 14px;
  padding: 22px;
  color: #ffffff;
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
  font-family: "Segoe UI", Tahoma, sans-serif;
}
.visitor-title {
  text-align: center;
  font-size: 18px;
  margin-bottom: 15px;
  letter-spacing: 1px;
}
.visitor-grid {
  display: flex;
  gap: 12px;
}
.visitor-box {
  flex: 1;
  background: rgba(255,255,255,0.18);
  border-radius: 10px;
  padding: 15px;
  text-align: center;
}
.visitor-number {
  font-size: 28px;
  font-weight: bold;
}
.visitor-label {
  font-size: 12px;
  letter-spacing: 1px;
  opacity: 0.9;
}
</style>
<div class="container">
<div class="visitor-wrap">
  <div class="visitor-title">Visitor Statistics</div>
  <div class="visitor-grid">
    <div class="visitor-box">
      <div class="visitor-number"><?= $today_visitors ?? 0 ?></div>
      <div class="visitor-label">Today</div>
    </div>
    <div class="visitor-box">
      <div class="visitor-number"><?= $total_visitors ?? 0 ?></div>
      <div class="visitor-label">Total</div>
    </div>
  </div>
</div>
</div>
