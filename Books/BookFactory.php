<?php

namespace  Books;

class BookFactory {

	private $bookMap = [
		'nv' => '\Books\Novel',
		'cb' => '\Books\ColoringBook'
	];

	function makeFromRequestModel($requestModel) {

		if (!array_key_exists($requestModel['bookType'], $this->bookMap)) {
			throw new NoSuchBookTypeException($requestModel['bookType']);
		}

		return new $this->bookMap[$requestModel['bookType']]($requestModel['title'], $requestModel['author']);
		
		// return new \Books\Novel("ABC","XYZ");
	}

	function makeManyFromRequestModels($requestModels) {
		$books = [];
		foreach ($requestModels as $requestModel) {
			$books[] = $this->makeFromRequestModel($requestModel);
		}
		return $books;
	}
}