<main role="main" class="bg-light pb-5">

	<!-- Hero Banner do Blog Olfativo -->
	<section class="py-5 text-white" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 50%, #415a77 100%);">
		<div class="container py-4">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<span class="badge bg-warning text-dark px-3 py-2 text-uppercase font-weight-bold mb-3 rounded-pill">
						<i class="fas fa-sparkles mr-1"></i> Guia Olfativo & Cuidados de Beleza
					</span>
					<h1 class="display-4 font-weight-bold mb-3">
						O Segredo das Fragrâncias & Saúde da Pele
					</h1>
					<p class="lead mb-4 text-light opacity-90" style="max-width: 700px;">
						Descubra como unir a química dos perfumes importados com cuidados essenciais de pele para alcançar fixação duradoura, projeção elegante e uma presença inesquecível.
					</p>
					<div class="d-flex flex-wrap gap-2">
						<a href="#artigos" class="btn btn-warning font-weight-bold text-dark px-4 py-2 me-2">
							<i class="fas fa-book-open mr-1"></i> Explorar Artigos & Dicas
						</a>
						<a href="<?= base_url('shop/produtos/Todos') ?>" class="btn btn-outline-light font-weight-bold px-4 py-2">
							<i class="fas fa-gem mr-1"></i> Ver Catálogo de Perfumes
						</a>
					</div>
				</div>
				<div class="col-lg-4 d-none d-lg-block text-center">
					<div class="p-4 rounded-circle bg-white bg-opacity-10 d-inline-block shadow-lg">
						<i class="fas fa-spray-can fa-6x text-warning"></i>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="container my-5" id="artigos">

		<!-- Categorias / Filtros do Blog -->
		<div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
			<span class="btn btn-dark btn-sm rounded-pill px-3 font-weight-bold active">
				<i class="fas fa-th-large mr-1"></i> Todos os Conteúdos
			</span>
			<span class="btn btn-outline-secondary btn-sm rounded-pill px-3 font-weight-bold">
				<i class="fas fa-clock mr-1"></i> Fixação & Duração
			</span>
			<span class="btn btn-outline-secondary btn-sm rounded-pill px-3 font-weight-bold">
				<i class="fas fa-pump-soap mr-1"></i> Skincare & Preparação
			</span>
			<span class="btn btn-outline-secondary btn-sm rounded-pill px-3 font-weight-bold">
				<i class="fas fa-tint mr-1"></i> Hidratação Profunda
			</span>
			<span class="btn btn-outline-secondary btn-sm rounded-pill px-3 font-weight-bold">
				<i class="fas fa-sun mr-1"></i> Proteção Solar
			</span>
		</div>

		<!-- Artigo em Destaque Principal -->
		<div class="card shadow border-0 rounded-lg overflow-hidden mb-5">
			<div class="row g-0">
				<div class="col-lg-6">
					<div class="ratio ratio-16x9 h-100" style="min-height: 320px;">
						<iframe src="https://www.youtube.com/embed/PLUorDoO1t0?si=-HxSspuPSsBUCCR9" title="Guia definitivo de skin care e rotina" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-center bg-white">
					<div>
						<span class="badge bg-danger text-white text-uppercase px-3 py-1 font-weight-bold rounded-pill mb-2">
							<i class="fas fa-star mr-1"></i> Destaque da Semana
						</span>
						<h2 class="font-weight-bold text-dark mt-2 mb-3">
							A Rotina de Skincare que Multiplica a Fixação do seu Perfume
						</h2>
						<p class="text-muted leading-relaxed mb-4">
							Você sabia que a pele ressecada dissipa as moléculas voláteis de fragrâncias até 3 vezes mais rápido? Perfumistas de elite revelam que uma cútis limpa e hidratada funciona como uma âncora olfativa, retendo notas de corpo e fundo ao longo do dia inteiro.
						</p>
					</div>
					<div class="d-flex align-items-center justify-content-between pt-3 border-top">
						<div class="d-flex align-items-center">
							<div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px;">
								<i class="fas fa-feather-alt"></i>
							</div>
							<div>
								<h6 class="mb-0 font-weight-bold text-dark small">Redação Fragance</h6>
								<small class="text-muted">6 min de leitura</small>
							</div>
						</div>
						<a href="https://youtu.be/PLUorDoO1t0" target="_blank" class="btn btn-outline-primary btn-sm font-weight-bold">
							Assistir no YouTube <i class="fas fa-external-link-alt ms-1"></i>
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Grid com os Cards de Dicas e Videos -->
		<div class="row g-4">

			<!-- Card 1: Limpeza Facial -->
			<div class="col-md-6 col-lg-4">
				<div class="card h-100 shadow-sm border-0 rounded-lg overflow-hidden transition hover-shadow">
					<div class="ratio ratio-16x9">
						<iframe src="https://www.youtube.com/embed/uPWMIR2vpLM?si=EA7vSjNxFgARs47P" title="Por que sempre limpar a pele" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="card-body p-4 d-flex flex-column">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-primary text-white rounded-pill px-2 py-1 small">Skincare</span>
							<small class="text-muted"><i class="far fa-clock mr-1"></i> 4 min</small>
						</div>
						<h5 class="font-weight-bold text-dark mb-2">1. Limpeza Profunda e Desobstrução</h5>
						<p class="text-muted small flex-grow-1">
							A higienização correta remove o excesso de sebo e resíduos que alteram o pH cutâneo. Uma pele equilibrada mantém as notas olfativas puras e sem distorção.
						</p>
						<div class="pt-3 border-top mt-auto">
							<a href="https://www.youtube.com/watch?v=uPWMIR2vpLM" target="_blank" class="text-primary font-weight-bold text-decoration-none small d-flex align-items-center justify-content-between">
								<span>Assistir aula completa</span>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Card 2: Esfoliacao -->
			<div class="col-md-6 col-lg-4">
				<div class="card h-100 shadow-sm border-0 rounded-lg overflow-hidden transition hover-shadow">
					<div class="ratio ratio-16x9">
						<iframe src="https://www.youtube.com/embed/sxkCW7Xpc1Q?si=56FEBIJdqzTfrwrH" title="Por que esfoliar a pele" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="card-body p-4 d-flex flex-column">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-info text-white rounded-pill px-2 py-1 small">Renovação</span>
							<small class="text-muted"><i class="far fa-clock mr-1"></i> 3 min</small>
						</div>
						<h5 class="font-weight-bold text-dark mb-2">2. Esfoliação e Renovação Celular</h5>
						<p class="text-muted small flex-grow-1">
							Remover as células mortas melhora a absorção dos óleos e cremes hidratantes, permitindo que a fragrância se fixe com maior uniformidade na derme.
						</p>
						<div class="pt-3 border-top mt-auto">
							<a href="https://www.youtube.com/watch?v=sxkCW7Xpc1Q" target="_blank" class="text-primary font-weight-bold text-decoration-none small d-flex align-items-center justify-content-between">
								<span>Assistir aula completa</span>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Card 3: Mascaras Faciais -->
			<div class="col-md-6 col-lg-4">
				<div class="card h-100 shadow-sm border-0 rounded-lg overflow-hidden transition hover-shadow">
					<div class="ratio ratio-16x9">
						<iframe src="https://www.youtube.com/embed/LEBEew_GEuc?si=PqGef6zCB1TIg29M" title="Por que usar mascaras faciais" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="card-body p-4 d-flex flex-column">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-success text-white rounded-pill px-2 py-1 small">Nutrição</span>
							<small class="text-muted"><i class="far fa-clock mr-1"></i> 5 min</small>
						</div>
						<h5 class="font-weight-bold text-dark mb-2">3. Máscaras e Tratamento Focado</h5>
						<p class="text-muted small flex-grow-1">
							Máscaras ricas em nutrientes devolvem o viço à tez, promovendo hidratação intensa e acalmando áreas sensíveis antes de eventos especiais.
						</p>
						<div class="pt-3 border-top mt-auto">
							<a href="https://www.youtube.com/watch?v=LEBEew_GEuc" target="_blank" class="text-primary font-weight-bold text-decoration-none small d-flex align-items-center justify-content-between">
								<span>Assistir aula completa</span>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Card 4: Hidratacao Interna / Agua -->
			<div class="col-md-6 col-lg-4">
				<div class="card h-100 shadow-sm border-0 rounded-lg overflow-hidden transition hover-shadow">
					<div class="ratio ratio-16x9">
						<iframe src="https://www.youtube.com/embed/q7R2mS0DONQ?si=o6S4UdrKP7RcWwj6" title="Beber agua e hidratacao" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="card-body p-4 d-flex flex-column">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-warning text-dark rounded-pill px-2 py-1 small">Bem-Estar</span>
							<small class="text-muted"><i class="far fa-clock mr-1"></i> 4 min</small>
						</div>
						<h5 class="font-weight-bold text-dark mb-2">4. Hidratação de Dentro para Fora</h5>
						<p class="text-muted small flex-grow-1">
							A ingestão adequada de água mantém o tônus cutâneo em níveis ideais. A pele viçosa preserva os óleos essenciais do perfume sem oxidá-los prematuramente.
						</p>
						<div class="pt-3 border-top mt-auto">
							<a href="https://www.youtube.com/watch?v=q7R2mS0DONQ" target="_blank" class="text-primary font-weight-bold text-decoration-none small d-flex align-items-center justify-content-between">
								<span>Assistir aula completa</span>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Card 5: Protetor Solar -->
			<div class="col-md-6 col-lg-4">
				<div class="card h-100 shadow-sm border-0 rounded-lg overflow-hidden transition hover-shadow">
					<div class="ratio ratio-16x9">
						<iframe src="https://www.youtube.com/embed/9BivKdTz16c?si=0mbkpBLPraYlB3Db" title="Protecao solar e cuidados" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="card-body p-4 d-flex flex-column">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-danger text-white rounded-pill px-2 py-1 small">Proteção</span>
							<small class="text-muted"><i class="far fa-clock mr-1"></i> 5 min</small>
						</div>
						<h5 class="font-weight-bold text-dark mb-2">5. Protetor Solar e Radiação UV</h5>
						<p class="text-muted small flex-grow-1">
							Dica de ouro: aplique o filtro solar sem perfume antes da fragrância para criar uma barreira protetora contra manchas e fotoenvelhecimento sob a luz do sol.
						</p>
						<div class="pt-3 border-top mt-auto">
							<a href="https://www.youtube.com/watch?v=9BivKdTz16c" target="_blank" class="text-primary font-weight-bold text-decoration-none small d-flex align-items-center justify-content-between">
								<span>Assistir aula completa</span>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Card 6: Guia de Hidratacao e Fixacao -->
			<div class="col-md-6 col-lg-4">
				<div class="card h-100 shadow-sm border-0 rounded-lg overflow-hidden transition hover-shadow">
					<div class="ratio ratio-16x9">
						<iframe src="https://www.youtube.com/embed/8eekJ-SarQo?si=Nv9-vxqsM7w6goYk" title="Guia de hidratacao de pele" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="card-body p-4 d-flex flex-column">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<span class="badge bg-secondary text-white rounded-pill px-2 py-1 small">Rotina</span>
							<small class="text-muted"><i class="far fa-clock mr-1"></i> 6 min</small>
						</div>
						<h5 class="font-weight-bold text-dark mb-2">6. Hidratação Noturna & Diária</h5>
						<p class="text-muted small flex-grow-1">
							Cremes hidratantes neutros aplicados nos pontos de pulsação (pulsos, nuca e dobra dos braços) funcionam como base fixadora premium para sua assinatura olfativa.
						</p>
						<div class="pt-3 border-top mt-auto">
							<a href="https://www.youtube.com/watch?v=8eekJ-SarQo" target="_blank" class="text-primary font-weight-bold text-decoration-none small d-flex align-items-center justify-content-between">
								<span>Assistir aula completa</span>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Secao Educacional: Os 5 Pontos de Pulsacao -->
		<div class="card border-0 shadow-lg rounded-lg my-5 overflow-hidden" style="background: linear-gradient(135deg, #2b2d42 0%, #1d3557 100%);">
			<div class="card-body p-4 p-md-5 text-white">
				<div class="text-center mb-5">
					<span class="badge bg-warning text-dark px-3 py-2 text-uppercase font-weight-bold rounded-pill mb-2">
						<i class="fas fa-bullseye mr-1"></i> Técnica de Aplicação
					</span>
					<h2 class="font-weight-bold">Onde Aplicar: Os 5 Pontos de Pulsação Quente</h2>
					<p class="text-light opacity-75" style="max-width: 650px; margin: 0 auto;">
						O calor sanguíneo dessas regiões intensifica o rastro e projeta a essência a cada movimento do seu corpo.
					</p>
				</div>

				<div class="row g-3 text-center">
					<div class="col-6 col-md">
						<div class="p-3 bg-white bg-opacity-10 rounded-3 h-100">
							<i class="fas fa-hand-holding-heart fa-2x text-warning mb-2"></i>
							<h6 class="font-weight-bold mb-1">Pulsos</h6>
							<small class="text-light opacity-75">Nunca esfregue os pulsos para não quebrar notas de topo.</small>
						</div>
					</div>
					<div class="col-6 col-md">
						<div class="p-3 bg-white bg-opacity-10 rounded-3 h-100">
							<i class="fas fa-user-astronaut fa-2x text-info mb-2"></i>
							<h6 class="font-weight-bold mb-1">Nuca & Pescoço</h6>
							<small class="text-light opacity-75">Cria a famosa 'aura' de rastro ao cumprimentar pessoas.</small>
						</div>
					</div>
					<div class="col-6 col-md">
						<div class="p-3 bg-white bg-opacity-10 rounded-3 h-100">
							<i class="fas fa-deaf fa-2x text-warning mb-2"></i>
							<h6 class="font-weight-bold mb-1">Atrás das Orelhas</h6>
							<small class="text-light opacity-75">Protegido de luz solar direta e ideal para projeção íntima.</small>
						</div>
					</div>
					<div class="col-6 col-md">
						<div class="p-3 bg-white bg-opacity-10 rounded-3 h-100">
							<i class="fas fa-hand-point-right fa-2x text-info mb-2"></i>
							<h6 class="font-weight-bold mb-1">Dobra dos Cotovelos</h6>
							<small class="text-light opacity-75">Ponto de alta irrigação sanguínea para exalação contínua.</small>
						</div>
					</div>
					<div class="col-12 col-md">
						<div class="p-3 bg-white bg-opacity-10 rounded-3 h-100">
							<i class="fas fa-tshirt fa-2x text-warning mb-2"></i>
							<h6 class="font-weight-bold mb-1">Clavícula & Peitoral</h6>
							<small class="text-light opacity-75">Excelente para fixação prolongada por baixo da camisa.</small>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Chamada para a Loja Virtual -->
		<div class="bg-white rounded-lg p-4 p-md-5 text-center shadow-sm border">
			<i class="fas fa-gem text-warning fa-3x mb-3"></i>
			<h3 class="font-weight-bold text-dark mb-2">Pronto para Encontrar sua Assinatura Olfativa?</h3>
			<p class="text-muted mb-4" style="max-width: 600px; margin: 0 auto;">
				Navegue por nossa seleção de perfumes masculinos, femininos e unissex das marcas mais renomadas do mundo com entrega expressa para todo o Brasil.
			</p>
			<a href="<?= base_url('shop/produtos/Todos') ?>" class="btn btn-primary btn-lg font-weight-bold px-5 shadow-sm">
				<i class="fas fa-store mr-2"></i> Acessar Catálogo de Perfumes
			</a>
		</div>

	</div>

</main>
