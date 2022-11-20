    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h6>Help</h6>
                    <ul>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Track Orders</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Categories</h6>
                    <ul>
                        <li><a href="browse.php">Womens</a></li>
                        <li><a href="browse.php">Mens</a></li>
                        <li><a href="browse.php">Shoes</a></li>
                        <li><a href="browse.php">Accessories</a></li>
                        <li><a href="browse.php">Bags</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h6>Get in Touch</h6>
                    <p>Any questions? Let us know at 12th floor, 222 Fake St, New Delhi, IN 10018 or call us on (+0) 44 343 7769</p>
                    <div class="d-flex social-links">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-center">Copyright &copy; 2021 | All Rights Reserved</p>
        </div>
    </footer>

    <script type="text/javascript">
        // jquery for search box
        $(document).ready(function(){
            $(".search-btn").click(function(){
                $("#search-box").slideToggle();
                $('#searchproduct').trigger("focus");
            });
        });
        // searched product page
        function search_product()
    	{
		    let keyword=document.getElementById("searchproduct").value;
            document.getElementById("searchproduct").value='';
            window.location.href = "search.php?query="+keyword;
    	}
    </script>
    
</body>
</html>