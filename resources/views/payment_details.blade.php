<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>

        #data{
            padding: 41px;
            background: black !important;
            text-align: center;
            color: white;
            border: white !important;
            justify-content: center;
        }

        #top-head{
            font-size: calc(1.475rem + 2.7vw);
        }
    </style>
  </head>
  <body>
    <div id="data">
      <h1 id="top-head">Latte Da</h1>
      <h3>Your Order Successfully Through By Latte De Admin Wait For Her Reply</h3>
      <p>Hi {{session('name')}},</p>
      <hr>
      <h3>Delivery Details</h3>
      <p>Name : {{session('name')}}</p>
      <p>Email : {{session('email')}}</p>
      <hr>
      <h3>Order Details</h3>
      <p>Order Number : #{{$order_number}}</p>
      <p>Item {{sizeof($product_id)}}</p>
      <p>Total Payment ${{$total}}</p>
    </div>
    
  </body>
</html>