
					<?php echo form_open (); ?>
					<?php echo validation_errors();?>
					<div class="container">
					<div class="col-md-6">
						<br>
						<br>

						<form>
							<legend>Tambah Data</legend>
							<div class="form-group">
								<label>Kelas</label>
								<select class="form-control" name="kelas" value="<?php echo set_value('kelas');?>">
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                </select>
							</div>

							<div class="form-group">
								<label>Sub kelas</label>
								<select class="form-control" name="sub_kelas" value="<?php echo set_value('sub_kelas');?>">
                                                <option>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                                <option>D</option>
                                                <option>E</option>
                                </select>
							</div>

                            <div class="form-group">
								<label>Jumlah Siswa</label>
								<input class="form-control" name="jml_siswa"  value="<?php echo set_value('jml_siswa');?>">
							</div>

							<div class="form-group">
								<label>Wali Kelas</label>
								<input class="form-control" name="nip" value="<?php echo set_value('nip');?>">
							</div>
							
							<label></label>
							<input type="submit" class="btn" name="submit" value="kirim">
						</form>
					<?php echo form_close();?>
					</div>
					</div>
				</div>
			</div>
		</div>
</div>