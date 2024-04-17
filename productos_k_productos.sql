-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: productos_k
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sku` varchar(50) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `precio_neto` decimal(10,2) NOT NULL,
  `precio_iva` decimal(10,2) NOT NULL,
  `precio_descuento` decimal(10,2) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'SKU001','Laptop HP Pavilion','Laptop HP Pavilion con procesador Intel Core i5 y 8GB de RAM',600.00,732.00,0.00,'Tecnología','https://d1pc5hp1w29h96.cloudfront.net/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/6/C/6C242LA-1_T1679646823.png',20),(2,'SKU002','Smartphone Samsung Galaxy S20','Smartphone Samsung Galaxy S20 con cámara de 64MP y pantalla de 6.2 pulgadas',800.00,976.00,0.00,'Tecnología','https://falabella.scene7.com/is/image/Falabella/16615765_1?wid=800&hei=800&qlt=70',15),(3,'SKU003','Televisor LG 4K','Televisor LG 4K de 55 pulgadas con tecnología OLED y Smart TV integrado',1000.00,1210.00,0.00,'Electrodomésticos','https://www.lg.com/content/dam/channel/wcms/cl/images/televisores/65ur7300psa_awhq_escl_cl_c/65UR7300PSA_AWHQ_ESCL_CL_C-450x450.jpg',10),(4,'SKU004','Zapatos Deportivos Nike Air Max','Zapatos deportivos Nike Air Max con tecnología Air y amortiguación',120.00,145.20,0.00,'Calzado','https://nikeclprod.vtexassets.com/arquivos/ids/157157-800-800?v=637654348166370000&width=800&height=800&aspect=true',30),(5,'SKU005','Camisa Polo Ralph Lauren','Camisa Polo Ralph Lauren de algodón con logo bordado en el pecho',50.00,60.50,0.00,'Ropa','https://cdn-images.farfetch-contents.com/22/34/91/25/22349125_52249936_1000.jpg',50),(6,'SKU006','Mochila Vans Old Skool','Mochila Vans Old Skool con compartimento acolchado para laptop',40.00,48.40,0.00,'Accesorios','https://vanscl.vtexassets.com/arquivos/ids/859519/VN000H4WBLK_S77_1.jpg?v=638452417650830000',25),(7,'SKU007','Libro ','Libro \"Cien años de soledad\" de Gabriel García Márquez',15.00,18.15,0.00,'Libros','https://images.cdn3.buscalibre.com/fit-in/360x360/61/8d/618d227e8967274cd9589a549adff52d.jpg',100),(8,'SKU008','Juego de Mesa Monopoly','Juego de mesa Monopoly edición clásica para toda la familia',30.00,36.30,0.00,'Juguetes','https://kindertop.cl/3296-large_default/juego-de-mesa-monopoly-clasico.jpg',20),(9,'SKU009','Cafetera Nespresso','Cafetera Nespresso con sistema de cápsulas y espumador de leche',80.00,97.60,0.00,'Electrodomésticos','https://falabella.scene7.com/is/image/Falabella/4028358_1?wid=1500&hei=1500&qlt=70',12),(10,'SKU010','Reloj Casio G-Shock','Reloj Casio G-Shock resistente al agua y a los golpes',70.00,85.40,0.00,'Accesorios','https://fotosol.cl/cdn/shop/products/p-ga-900-1adr-1-5a7d72c1-c45a-4942-9f0a-655dffcb00c9_1800x1800_0a85f0b6-9736-463d-9c1f-5630628b5923_5000x.jpg?v=1620774057',18),(21,'SKU011','Cámara Canon EOS Rebel T7','Cámara Canon EOS Rebel T7 con sensor CMOS de 24.1MP y pantalla LCD',450.00,547.50,0.00,'Tecnología','https://www.canontiendaonline.cl/wcsstore/CCHCatalogAssetStore/2727C002_01.jpg',8),(22,'SKU012','Silla de Oficina Ergonómica','Silla de oficina ergonómica con respaldo ajustable y soporte lumbar',120.00,145.20,0.00,'Muebles','https://ae01.alicdn.com/kf/Scb67117ffeca4c5896871966ca4405feB/Silla-de-oficina-ergon-mica-de-malla-con-perchas-silla-ejecutiva-de-Espalda-alta-con-soporte.jpg_.webp',15),(23,'SKU013','Pantalones Vaqueros Levis','Pantalones vaqueros Levis 501 de corte recto y estilo clásico',60.00,72.60,0.00,'Ropa','https://leviscl.vtexassets.com/arquivos/ids/1230958-800-auto?v=638435186192270000&width=800&height=auto&aspect=true',35),(24,'SKU014','Impresora HP DeskJet 2720','Impresora HP DeskJet 2720 con impresión inalámbrica y escaneo',80.00,97.60,0.00,'Tecnología','https://ssl-product-images.www8-hp.com/digmedialib/prodimg/lowres/c07019751.png',10),(25,'SKU015','Colchón Queen Size Memory Foam','Colchón Queen Size con tecnología de espuma viscoelástica',300.00,363.00,0.00,'Hogar','https://eu-images.contentstack.com/v3/assets/blt167b24547e5b1906/blt8fcb70755a6ab8a9/6570ebd46778ef040a6a7cae/Emma_Confort_PRemium.png?width=1536&format=pjpg&auto=webp&quality=80&disable=upscale',5),(26,'SKU016','Juego de Tazas de Café de Porcelana','Juego de tazas de café de porcelana con diseño elegante',25.00,30.25,0.00,'Vajilla','https://ae01.alicdn.com/kf/Sb9f8b3d0cf2b4f52b1b384eafa181aa2f/Juego-de-tazas-de-caf-de-porcelana-juego-de-t-de-porcelana-regalo-de-lujo-caf.jpg_.webp',20),(27,'SKU017','Teclado mecánico gaming RGB','Teclado mecánico gaming con retroiluminación RGB y switches Cherry MX',80.00,97.60,0.00,'Tecnología','https://ae01.alicdn.com/kf/H9c7abd98e484420480f1294ce85952bdO/Teclado-mec-nico-para-juegos-con-retroiluminaci-n-LED-104-teclas-interruptores-antighosting-negros-rojos-y.jpg_.webp',12),(28,'SKU018','Bicicleta de Montaña Schwinn','Bicicleta de montaña Schwinn con cuadro de aluminio y suspensión delantera',350.00,423.50,0.00,'Deportes','https://i5.walmartimages.com/seo/Schwinn-29-in-Boundary-Mens-Mountain-Bike-Black-and-Green_beabdde3-97e2-4b65-9d7d-125374fffc6d.129b2a290e612879327416792e8bd296.jpeg',7),(29,'SKU019','Set de Herramientas de Mano Stanley','Set de herramientas de mano Stanley con destornilladores, llaves y alicates',50.00,60.50,0.00,'Herramientas','https://falabella.scene7.com/is/image/Falabella/gsc_119966640_2550927_1?wid=1500&hei=1500&qlt=70',25),(37,'SKU023','TV LG 43','TV SMART TV ',250.00,310.00,0.00,'Tecnología','https://www.lg.com/ar/images/televisores/md05827914/gallery/43UJ6560-Destop01_09082017.jpg',9),(38,'SKU024','TV LG 55','TV SMARTV LG ',380.00,450.00,0.00,'Tecnología','https://www.lg.com/content/dam/channel/wcms/cl/images/televisores/55ur8750psa_awh_escl_cl_c/gallery/450.jpg',11),(39,'SKU025','Destornillador inalambrico','destornillador marca bauker',10.00,12.00,0.00,'Herramientas','https://sodimac.scene7.com/is/image/SodimacCL/8769818_00?wid=1500&hei=1500&qlt=70',2),(40,'SKU026','Taladro 600w bauker','Taladro 600w bauker',50.00,66.00,0.00,'Herramientas','https://sodimac.scene7.com/is/image/SodimacCL/2070774_00?wid=1500&hei=1500&qlt=70',9);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-17  9:42:45
