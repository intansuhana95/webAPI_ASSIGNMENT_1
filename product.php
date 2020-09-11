<?php
use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

//include productsProc.php file
include __DIR__ . '/../function/productProc.php';


//read request db
$app->get('/requestdb', function (Request $request, Response $response, array
$arg){
 return $this->response->withJson(array('data' => 'success'), 200);
});

//read all product
$app->get('/products', function (Request $request, Response $response, array $arg)
{
    $data = getAllProducts($this->db);
    if (is_null($data)) 
    {
    return $this->response->withJson(array('error' => 'no data'), 404);
    }

 return $this->response->withJson(array('data' => $data), 200);
});



//request table products by condition
//$app->get('/products/[{id}]', function ($request, $response, $args){

// $productId = $args['id'];
// if (!is_numeric($productId)) {
// return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
// }
 //$data = getProduct($this->db,$productId);
 //if (empty($data)) {
 //return $this->response->withJson(array('error' => 'no data'), 404);
//}
 //return $this->response->withJson(array('data' => $data), 200);
//});

//insert data
$app->post('/insertProduct', function(Request $request, Response $response,array $arg){  

    $form_data=$request->getParsedBody();
    $data = createProduct($this->db, $form_data);
  
    if (is_null($data)) {
      return $this->response->withJson(array('error' => 'no data'), 404);
    }
    
  
  return $this->response->withJson(array('data' => 'successfully added'), 200);
    
  
  });

  /*delete row
$app->delete('/products/del/[{id}]', function ($request, $response, $args){

    $productId = $args['id'];
   if (!is_numeric($productId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
   $data = deleteProduct($this->db,$productId);
   if (empty($data)) {
   return $this->response->withJson(array($productId=> 'is successfully deleted'), 202);};
   }); */


   //put table products
   //$app->put('/products/put/[{id}]', function ($request,  $response,  $args){
   // $productId = $args['id'];
   // $date = date("Y-m-j h:i:s");
    
  // if (!is_numeric($productId)) {
    //  return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
  // }
  //  $form_dat=$request->getParsedBody();
    
  //$data=updateProduct($this->db,$form_dat,$productId,$date);
  
  //return $this->response->withJson(array('data' => 'successfully added'), 200);
  
  //});
  


//ASSIGNMENT INDIVIDUAL 

//request table products by price
$app->get('/products/[{price}]', function ($request, $response, $args){

    $productPrice = $args['price'];
    if (!is_numeric($productPrice)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $data = getProduct($this->db,$productPrice);
    if (empty($data)) {
    return $this->response->withJson(array('error' => 'no data'), 404);
   }
    return $this->response->withJson(array('data' => $data), 200);
   });


   //put table products
   $app->put('/products/put/[{price}]', function ($request,  $response,  $args){
    $productPrice = $args['price'];
    $date = date("Y-m-j h:i:s");
    
   if (!is_numeric($productPrice)) {
      return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
    $form_dat=$request->getParsedBody();
    
  $data=updateProduct($this->db,$form_dat,$productPrice,$date);
  
  return $this->response->withJson(array('data' => 'successfully added'), 200);

  });
  
  // delete by row
$app->delete('/products/del/[{price}]', function ($request, $response, $args){

    $productPrice = $args['price'];
   if (!is_numeric($productPrice)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
   }
   $data = deleteProduct($this->db,$productPrice);
   if (empty($data)) {
   return $this->response->withJson(array($productPrice=> 'is successfully deleted'), 202);};
   });