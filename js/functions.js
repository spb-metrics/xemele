// Ciclo de destaques
jQuery(function(){
  jQuery('.destaque').cycle({ 
	fx:      'fade', 
	timeout: 6000, 
	delay:   -2000,
	next:    '#proximo', 
	prev:    '#anterior',
	pager:   '.nav' 
	});
});

 