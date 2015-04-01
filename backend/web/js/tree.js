$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > a').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > span.glyphicon').addClass('glyphicon-folder-close').removeClass('glyphicon-folder-open');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > span.glyphicon').addClass('glyphicon-folder-open').removeClass('glyphicon-folder-close');
        }
        e.preventDefault();
    })/*.on('drag', function (e) {
        var elemn = $(this);
        $(this).parent('li').after(elemn.addClass('flying').css('top',e.offsetX).css('left',e.offsetY));
    })*/;
    
    if (!Modernizr.draganddrop /*&& window.FileReader*/) {
        // Browser supports HTML5 DnD.
        /*function allowdrop(ev){
            ev.preventDefault();
        };
    			
        function drag(ev){
            ev.dataTransfer.setData("Text",ev.target.id);
        };
    			
        function drop(ev){
            ev.preventDefault();
            var data = ev.dataTransfer.getData("Text");
            ev.target.appendChild(document.getElementById(data));
        };*/
        
    } else {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'js/jquery-ui.min.js';
        document.getElementsByTagName('head')[0].appendChild(script);
        script.addEventListener('load', function(){

                /*$("[draggable=true]").draggable({
                    revert: true,
                    parent: 'ul'
                });*/
            	/*$('.sortable-list').sortable({
            		connectWith: '.sortable-list li',
            		placeholder: 'placeholder',
            	});*/
                /*
        		$(".sortable-list").sortable({
            		connectToDraggable: '.sortable-list',
            		placeholder: 'placeholder'
        		});
        		$(".sortable-list").draggable({
        			connectToSortable: ".sortable-list li",
        			revert: true
        		});
        		$( "ul, li" ).disableSelection();*/



        	$(function() { // Fallback to a library solution.
                $(".sortable-list").sortable({
                    placeholder: 'placeholder',
                    connectWith: ".sortable-list",
                    items: "> li",
                    cursor: "move",
                    distance: 5,
                    opacity: 0.7,
                    tolerance: "pointer",
                    /*revert: true,*/
                    /*axis: "y"*/
                    
                    /*start: function(e, ui){
                        //alert('start');
                    },
                    stop: function(e, ui){
                        //alert('stop');
                    },
                    change: function(e, ui){
                        //alert('change');
                    },
                    receive: function(e, ui){
                        //alert('receive'); // переместился с изменением родителя
                    },
                    activate: function(e, ui){
                        var item = jQuery(this);
                        var position = item.position();
                        ui.offset = '{'+position.left+','+position.top+'}';
                    },*/
                });
                $(".sortable-list").disableSelection();
        	});
        }, false);
    };
    
    
    
    
    
    
    
    
});