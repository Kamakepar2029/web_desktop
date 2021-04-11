var dragMaster1 = (function() {

	var dragObject
	var mouseOffset

	function getMouseOffset(target, e) {
		var docPos	= getPosition(target)
		return {x:e.pageX - docPos.x, y:e.pageY - docPos.y}
	}

	function nonemouseUp(){
		console.log('Locked element')
	}

	function mouseUp(){
		dragObject = null

		// clear events
		document.onmousemove = null
		document.onmouseup = null
		document.ondragstart = null
		document.body.onselectstart = null
	}

	function mouseMove(e){
		e = fixEvent(e)

		with(dragObject.style) {
			position = 'absolute'
			top = e.pageY - mouseOffset.y + 'px'
			left = e.pageX - mouseOffset.x + 'px'
		}
		return false
	}

	function mouseDown(e) {
		e = fixEvent(e)
		if (e.which!=1) return

		dragObject  = this
		mouseOffset = getMouseOffset(this, e)

		document.onmousemove = mouseMove
		document.onmouseup = mouseUp

		// отменить перенос и выделение текста при клике на тексте
		//document.ondragstart = function() { return false }
		//document.body.onselectstart = function() { return false }

		return false
	}

	return {
		makeDraggable: function(element){
			element.onmousedown = mouseDown
		},
		notmakeDraggable: function(element){
			element.onmousedown = nonemouseUp
		}
	}

}())

function getPosition(e){
	var left = 0
	var top  = 0

	while (e.offsetParent){
		left += e.offsetLeft
		top  += e.offsetTop
		e	 = e.offsetParent
	}

	left += e.offsetLeft
	top  += e.offsetTop

	return {x:left, y:top}
}
