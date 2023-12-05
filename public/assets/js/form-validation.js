$(function() {
	'use strict'
	$(document).ready(function() {
		$('.select2').select2({
			placeholder: 'اختر الفرع '
		});
		$('.select2-no-search').select2({
			minimumResultsForSearch: Infinity,
			placeholder: 'اختر الفرع '
		});
	});
	$('#selectForm').parsley();
	$('#selectForm2').parsley();
});
