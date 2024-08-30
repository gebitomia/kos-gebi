</main>
<!-- Footer Section Begin -->
<footer class="footer-section">
	<div class="container">
		<div class="footer-text">
			<div class="row">
				<div class="col-lg-4">
					<div class="ft-about">
						<div class="logo">
							<a href="#">
								<img src="img/footer-logo.png" alt="">
							</a>
						</div>
						<p>Kami menginspirasi dan menjangkau jutaan pengunjung kos<br /> Dengan lama berdiri hampir 5 tahun</p>
						<div class="fa-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<!-- <a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-tripadvisor"></i></a> -->
							<a href="#"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-youtube-play"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 offset-lg-1">
					<div class="ft-contact">
						<h6>Kontak</h6>
						<ul>
							<li>+62 813-4300-9779</li>
							<li>gebitomia@gmail.com</li>
							<li>Indonesia, Maluku, Kota Ambon, Kec Waiheru, jln Asrama</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 offset-lg-1">
					<div class="ft-newslatter">
						<h6>Berita Terbaru</h6>
						<p>Kami akan mengirim informasi terbaru kami mengenai kos kami</p>
						<p>Silahkan kirim email anda untuk mendapat info terbaru kami</p>
						<form action="#" class="fn-form">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fa fa-send"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<ul>
						<li><a href="#">Kontak</a></li>
						<li><a href="#">Privacy</a></li>
					</ul>
				</div>
				<div class="col-lg-5">
					<div class="co-text">
						<p>
							<!-- Link back to gebitomia can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> Semua hak cipta dilindungi undang-undang | Templat ini dibuat dengan <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Gebi Tomia</a>
							<!-- Link back to gebitomia can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="js/ikos.js"></script>

<script>
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			var forms = document.getElementsByClassName('needs-validation');
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>

</body>

</html>