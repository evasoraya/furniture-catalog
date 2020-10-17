function convertToPDF() {
    var node = document.getElementById('productDetails');

    domtoimage.toJpeg(document.getElementById('productDetails'))
        .then(function (blob) {
            window.saveAs(blob, 'my-node.png');
        });



}
