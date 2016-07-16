<?php
namespace  Books;

class NovelTest extends \PHPUnit_Framework_TestCase {

	function testNovel() {
		$title = 'The Lov of My Life';
		$author = 'Romantic Writer';
		$novel = new Novel($title, $author);
		$novel->setCategory('romance');

		$this->assertEquals('romance', $novel->getCategory());
		$this->assertEquals($title, $novel->getTitle());
		$this->assertEquals($author, $novel->getAuthor());
	}

	function testItCanTellActualNumberOfPages() {
		$novel = new Novel();
		$novel->setAllPages(100);
		$this->assertEquals(98, $novel->numberOfPages());
	}

	function testItHasAStringRepresentation() {
		$novel = new Novel('Star Trek', 'Gene Roddenberry');
		$novel->setAllPages(15);
		$novel->setCategory('scifi');

		$this->assertRegExp('/Title=Star Trek/', $novel->__toString());
		$this->assertRegExp('/AllPages=15/', $novel->__toString());
		$this->assertRegExp('/Category=scifi/', $novel->__toString());


	}

}

?>
