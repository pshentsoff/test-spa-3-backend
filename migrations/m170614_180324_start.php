<?php

use yii\db\Migration;

class m170614_180324_start extends Migration
{
    public function up()
    {
		$this->execute("

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
-- USE effect_test;

--
-- Описание для таблицы suppliers
--
DROP TABLE IF EXISTS suppliers;
CREATE TABLE suppliers (
  suppliers_id INT(21) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  name VARCHAR(250) NOT NULL COMMENT 'Название',
  PRIMARY KEY (suppliers_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы goods
--
DROP TABLE IF EXISTS goods;
CREATE TABLE goods (
  goods_id INT(21) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  name VARCHAR(250) NOT NULL COMMENT 'Название',
  code VARCHAR(255) DEFAULT NULL COMMENT 'Артикул',
  price DECIMAL(19, 2) DEFAULT NULL COMMENT 'Цена',
  price_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата прайса',
  suppliers_id INT(21) NOT NULL COMMENT 'Поставщик',
  PRIMARY KEY (goods_id),
  CONSTRAINT FK_goods_suppliers_id FOREIGN KEY (suppliers_id)
    REFERENCES suppliers(suppliers_id) ON DELETE NO ACTION ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы suppliers
--
INSERT INTO suppliers VALUES
(1, 'Рога и копыта'),
(2, 'ООО Русь'),
(4, 'Пример');

-- 
-- Вывод данных для таблицы goods
--
INSERT INTO goods VALUES
(1, 'test товар', NULL, NULL, '2017-05-09 04:19:30', 1);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;		
		
		");
    }

    public function down()
    {
        echo "m170614_180324_start cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
