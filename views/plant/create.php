<center><h1 style="color:#4CAF50 ; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"> Enter Your Plant</h1></center>
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div style="width: 25%; border: 1px solid #ccc; border-radius: 4px; padding: 20px; box-shadow: 0px 3px 10px 1px #387239">
      <form style="display: flex; flex-direction: column;" method='POST'>
        <label for="plants_type" style="margin-bottom: 10px;">Plants Type</label>
        <select id="plants-type" name="plants_type" style="border-radius: 4px; padding: 8px; margin-bottom: 10px;">
          <option value="fruitful-trees">Fruitful Trees</option>
          <option value="grains">Grains</option>
          <option value="vegetables">Vegetables</option>
        </select>
  
        <label for="product_quantity" style="margin-bottom: 10px;">Product Quantity: Tons</label>
        <input type="number" id="product-quantity" name="product_quantity" style="border-radius: 4px; padding: 8px; margin-bottom: 10px;">
  
        <label for="annual_production" style="margin-bottom: 10px;">Annual Production</label>
        <input type="number" id="annual-production" name="annual_production" style="border-radius: 4px; padding: 8px; margin-bottom: 10px;">
        
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Submit</button>
      </form>
    </div>
  </div>