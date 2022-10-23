document.addEventListener('keydown', (event) => {
	const keyName = event.key;
	const keyCode = event.keyCode;
	if (keyName == "Enter" || keyCode == 13) {
		event.preventDefault();
	}
});
