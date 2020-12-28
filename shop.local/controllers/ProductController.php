<?php
class ProductController {
	public function actionView($productId) {
		//echo 'ProductController actionView';
		
		//подтянуть из БД список категорий, используя метод из модели Category
		
		//обратиться к модели Product и запросить инфо о товаре, id которого мы получили -> написать в модели Product метод getProductById($id), который получит из БД всю инфо о конкр. товаре
		
		//подключить вид product/view.php   -> в виде обеспечить вывод категорий и вывод инфо о товаре
		return true;
	} // end actionView()
	
	
}
?>
