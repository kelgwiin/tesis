<script>
	$(function()
	{
		$('.toggledetails').click(function(e)
		{
			e.preventDefault();
			$(this).children('.pull-left').toggle();
			$(this).children('.pull-right').children('.fa').toggle();
			$(this).parent().children(':last').toggleClass('hidden');
		});
		
		$()
	});
</script>