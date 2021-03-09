/*
BISMILLAAHIRRAHMAANIRRAHIIM - In the Name of Allah, Most Gracious, Most Merciful
================================================================================
filename : mbti_test.sql
purpose  : dummy data 
create   : 20210210
last edit: 20210309
author   : cahya dsn
================================================================================
This program is free software; you can redistribute it and/or modify it under the
terms of the MIT License.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

See the MIT License for more details

copyright (c) 2021 by cahya dsn; cahyadsn@gmail.com
================================================================================*/
DROP TABLE IF EXISTS mbti_test_statements;
CREATE TABLE IF NOT EXISTS mbti_test_statements(
  id INT NOT NULL AUTO_INCREMENT,
  question VARCHAR(255),
  statement1 VARCHAR(255),
  statement2 VARCHAR(255),
  type1 CHAR(1),
  type2 CHAR(1),
  PRIMARY KEY (id)
) ENGINE=MyISAM;

INSERT INTO mbti_test_statements VALUES
( 1,'question1', 'statement1A', 'statement1B','E','I'),
( 2,'question2', 'statement2A', 'statement2B','S','N'),
( 3,'question3', 'statement3A', 'statement3B','S','N'),
( 4,'question4', 'statement4A', 'statement4B','T','F'),
( 5,'question5', 'statement5A', 'statement5B','T','F'),
( 6,'question6', 'statement6A', 'statement6B','J','P'),
( 7,'question7', 'statement7A', 'statement7B','J','P'),
( 8,'question8', 'statement8A', 'statement8B','E','I'),
( 9,'question9', 'statement9A', 'statement9B','S','N'),
(10,'question10','statement10A','statement10B','S','N'),
(11,'question11','statement11A','statement11B','T','F'),
(12,'question12','statement12A','statement12B','T','F'),
(13,'question13','statement13A','statement13B','J','P'),
(14,'question14','statement14A','statement14B','J','P'),
(15,'question15','statement15A','statement15B','E','I'),
(16,'question16','statement16A','statement16B','S','N'),
(17,'question17','statement17A','statement17B','S','N'),
(18,'question18','statement18A','statement18B','T','F'),
(19,'question19','statement19A','statement19B','T','F'),
(20,'question20','statement20A','statement20B','J','P'),
(21,'question21','statement21A','statement21B','J','P'),
(22,'question22','statement22A','statement22B','E','I'),
(23,'question23','statement23A','statement23B','S','N'),
(24,'question24','statement24A','statement24B','S','N'),
(25,'question25','statement25A','statement25B','T','F'),
(26,'question26','statement26A','statement26B','T','F'),
(27,'question27','statement27A','statement27B','J','P'),
(28,'question28','statement28A','statement28B','J','P'),
(29,'question29','statement29A','statement29B','E','I'),
(30,'question30','statement30A','statement30B','S','N'),
(31,'question31','statement31A','statement31B','S','N'),
(32,'question32','statement32A','statement32B','T','F'),
(33,'question33','statement33A','statement33B','T','F'),
(34,'question34','statement34A','statement34B','J','P'),
(35,'question35','statement35A','statement35B','J','P'),
(36,'question36','statement36A','statement36B','E','I'),
(37,'question37','statement37A','statement37B','S','N'),
(38,'question38','statement38A','statement38B','S','N'),
(39,'question39','statement39A','statement39B','T','F'),
(40,'question40','statement40A','statement40B','T','F'),
(41,'question41','statement41A','statement41B','J','P'),
(42,'question42','statement42A','statement42B','J','P'),
(43,'question43','statement43A','statement43B','E','I'),
(44,'question44','statement44A','statement44B','S','N'),
(45,'question45','statement45A','statement45B','S','N'),
(46,'question46','statement46A','statement46B','T','F'),
(47,'question47','statement47A','statement47B','T','F'),
(48,'question48','statement48A','statement48B','J','P'),
(49,'question49','statement49A','statement49B','J','P'),
(50,'question50','statement50A','statement50B','E','I'),
(51,'question51','statement51A','statement51B','S','N'),
(52,'question52','statement52A','statement52B','S','N'),
(53,'question53','statement53A','statement53B','T','F'),
(54,'question54','statement54A','statement54B','T','F'),
(55,'question55','statement55A','statement55B','J','P'),
(56,'question56','statement56A','statement56B','J','P'),
(57,'question57','statement57A','statement57B','E','I'),
(58,'question58','statement58A','statement58B','S','N'),
(59,'question59','statement59A','statement59B','S','N'),
(60,'question60','statement60A','statement60B','T','F'),
(61,'question61','statement61A','statement61B','T','F'),
(62,'question62','statement62A','statement62B','J','P'),
(63,'question63','statement63A','statement63B','J','P'),
(64,'question64','statement64A','statement64B','E','I'),
(65,'question65','statement65A','statement65B','S','N'),
(66,'question66','statement66A','statement66B','S','N'),
(67,'question67','statement67A','statement67B','T','F'),
(68,'question68','statement68A','statement68B','T','F'),
(69,'question69','statement69A','statement69B','J','P'),
(70,'question70','statement70A','statement70B','J','P');

DROP TABLE IF EXISTS mbti_test_interprestation;
CREATE TABLE IF NOT EXISTS mbti_test_interprestation(
  symbol CHAR(4) NOT NULL,
  short VARCHAR(30) NOT NULL,
  description TEXT NOT NULL,
  PRIMARY KEY (symbol)
);

INSERT INTO mbti_test_interprestation
VALUES
	('ISTJ','short1','description1'),
	('ISFJ','short2','description2'),
	('ISTP','short3','description3'),
	('ISFP','short4','description4'),
	('INFJ','short5','description5'),
	('INTJ','short6','description6'),
	('INFP','short7','description7'),
	('INTP','short8','description8'),
	('ESTP','short9','description9'),
	('ESFP','short10','description10'),
	('ENFP','short11','description11'),
	('ENTP','short12','description12'),
	('ESTJ','short13','description13'),
	('ESFJ','short14','description14'),
	('ENFJ','short15','description15'),
	('ENTJ','short16','description16')
;