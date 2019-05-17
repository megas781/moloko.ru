<h2 id="asdf"></h2>
<script src="master/base.js"></script>
<script>

    localStorage.clear();

    console.log(getCart());
    
    addItem(1, 5);
    
    console.log(getCart());
    
    addItem(4, 8);

    console.log(getCart());

    removeItem(4);

    console.log(getCart());

    removeItem(3);
    
    console.log(getCart());

</script>