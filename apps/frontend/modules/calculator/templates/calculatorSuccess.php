<form method="post" action="<?php url_for('@calculator') ?>">
  <label>Number A : <input type="text" name="number_a" /></label><br/>
  <label>Number B : <input type="text" name="number_b" /></label><br/>
  <label>Action :
  <select name="do">
    <option value="add">Add</option>
    <option value="sub">Substract</option>
    <option value="mul">Multiply</option>
    <option value="div">Divide</option>
  </select><br />
  <input type="submit" value="calculate" />
</form>
