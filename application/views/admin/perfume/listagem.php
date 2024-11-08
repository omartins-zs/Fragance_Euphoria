  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header d-flex align-items-center justify-content-between py-3">
          <h6 class="m-0 font-weight-bold text-primary">Lista de perfumes</h6>
          <a class="d-sm-inline-block btn btn-sm btn-success shadow-sm" href="<?= base_url('admin/perfume/novo') ?>"><i
                  class="fas fa-plus-circle fa-sm"></i> Novo perfume</a>
      </div>
      <div class="card-body">
          <?php if ($this->session->flashdata('msg')) : ?>
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <?= $this->session->flashdata('msg') ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php endif ?>
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th class="col-1">Imagem</th>
                          <th>Perfume</th>
                          <th class="col-1">Marca</th>
                          <th>Tipo</th>
                          <th class="col-1">Volume</th>
                          <th class="col-1">Preço</th>
                          <th class="col-1">Estoque</th>
                          <th class="col-1">Ações</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php if (count($perfumes)) : foreach ($perfumes['perfumes'] as $perfume) : ?>
                      <tr>
                          <td><img style="width: 4rem; height: 4rem; object-fit: contain;"
                                  src="<?= !empty($perfume->imagem) ? base_url('assets/admin/upload/' . $perfume->imagem) : base_url('assets/img/perfume_default.png'); ?>"
                                  alt="<?= isset($perfume->descricao_info) ? $perfume->descricao_info : 'N/A'; ?>">
                          </td>
                          <!-- <td><img class="rounded-circle" style="width: 4rem; height: 4rem;" src="<?= base_url('assets/admin/upload/' .  $perfume->imagem); ?>"></td> -->
                          <td><?= $perfume->nome; ?></td>
                          <td><?= isset($perfume->nome_marca) ? $perfume->nome_marca : 'N/A'; ?>
                          </td>
                          <td><?= $perfume->tipo; ?></td>
                          <td><?= $perfume->volume ?></td>
                          <td>R$ <?= $perfume->preco ?></td>
                          <td><?= $perfume->estoque ?></td>
                          <td>
                              <a href="<?= base_url('admin/perfume/edit/' . $perfume->id); ?>"
                                  class="btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm"></i> Editar</a>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                      <?php else : ?>
                      <tr>
                          <td colspan="7" class="text-center">Não existem perfumes.</td>
                      </tr>
                      <?php endif; ?>


                  </tbody>
              </table>
          </div>
      </div>
  </div>
