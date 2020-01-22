//||||================================================||||//
//||||================================================||||//
//||||        	CSV Converter By Re-Skinning          ||||//
//||||================================================||||//
//||||================================================||||//
document.addEventListener('DOMContentLoaded', function() {
	function showHideTableParts() {
		const toggleRow = document.getElementsByClassName("toggle-row-click");
		for (i=0; i< toggleRow.length; i++) {
			toggleRow[i].addEventListener("click", (e) => {
				const sibling = e.target.closest("tr").nextSibling;
				if (sibling.classList.contains("hidden")) {
					sibling.classList.remove("hidden");
					sibling.classList.add("visible");
					e.target.closest("tr").classList.add("gray-color");
				} else {
					sibling.classList.remove("visible");
					sibling.classList.add("hidden");
					e.target.closest("tr").classList.remove("gray-color");
				}
			})
		}
	}
	showHideTableParts();
});
//||||================================================||||//
//||||================================================||||//
//||||        	CSV Converter By Re-Skinning          ||||//
//||||================================================||||//
//||||================================================||||//


