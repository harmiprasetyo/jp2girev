<style>
	.info {
		color: 999;
	}
</style>
<!-- Content area -->
				<div class="content">

					<div class="row">
						<div class="col-md-12">

								<div class="row">
									<div class="col-md-12">
											<table class="table table-lg" width="100%" style="width:100%">
													<tbody>
														<tr>
															<td width="130px" style="border-top: 0"><span class="text-muted">Photo</span></td>
															<td style="border-top: 0" ><img class="rounded-circle img-fluid" src="{{URL('public/images/speakers/'.$detail->image)}}" /></td>
														</tr>

														<tr>
																<td><span class="text-muted">Name</span></td>
																<td><strong>{{ $detail->name }}</strong></td>
															</tr>
														
														<tr>
															<td><span class="text-muted">Position</span></td>
															<td>{!!$detail->position!!}</td>
														</tr>
														<tr>
															<td><span class="text-muted">Bio</span></td>
																<td>{!!nl2br($detail->bio)!!}</td>
															</tr>
														
													</tbody>
												</table>
									</div>		
								</div>

						</div>					
					</div>
				</div>
				<!-- /content area -->