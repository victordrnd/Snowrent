<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';

$chaletid = $_SESSION['reservationChaletId'];
$chalet = new Chalet;
$chaletinfo = $chalet->details($chaletid);

$_SESSION['RESDateArr'] = $_POST['datearr'];
$_SESSION['RESDateDep'] = $_POST['datedep'];
//calcul du tarif pour la réservation
$date1 = new DateTime($_POST['datearr']);
$date2 = new DateTime($_POST['datedep']);

$nbrdejour = $date1->diff($date2);
$nbrdejour =  $nbrdejour->format('%a');



//nbr de vacanciers
$nbrvacanciers = (intval($_POST['adultes']) + intval($_POST['enfants']));

$tarif = $nbrdejour * $chaletinfo[1]['CATPrix'] * $nbrvacanciers;

$_SESSION['RESTarif'] = $tarif;
?>
<body>
  <div class="container">

    <h1 class="text-center">Autorisation de paiement</h1>
    <div class="row justify-content-center">
      <div class="col-md-3 col-12">
        <div class="card shadow-small border-0">
          <img src="<?=ROOTDIR?>upload/chalets/<?=$_SESSION['reservationChaletId']?>.png" onerror="this.src='<?=ROOTDIR?>assets/404.png'" class="card-img-top"/>
          <div class="card-body ">test - 45€ par nuit</div>
        </div>
      </div>
      <div class="col-md-7 col-12 shadow-small">

        <h3 class="text-center mt-5">Récapitulatif de paiment</h3>
        <table class="table mt-3">

          <tbody>
            <tr>
              <th scope="row">Nombre de vacanciers</th>
              <td><?=$nbrvacanciers?></td>
            </tr>
            <tr>
              <th scope="row">Nombre de nuits</th>
              <td><?=$nbrdejour?></td>
            </tr>
            <tr>
              <th scope="row">Tarif </th>
              <td class="text-primary"><?= $tarif?> €</td>
            </tr>
          </tbody>
        </table>

        <hr class="mt-5 w-50"/>
        <h3 class="text-center">Informations bancaires</h3>
        <label class="small text-muted text-center mx-auto d-block">(code : 4242 4242 4242 4242 le reste peu importe )</label>
        <form action="charge.php" method="post" class="mt-5" id="payment-form">
          <div id="card-element" class="uk-box-shadow-medium" style="margin-left:auto;margin-right:auto;display:block;">
            <!-- A Stripe Element will be inserted here. -->
          </div>
          <div id="card-errors" role="alert" style="text-align:center;color:#fa755a !important" class="text-danger"></div>
          <button type="submit" name="submit" style="margin-left:auto;margin-right:auto;display:block;margin-bottom:20px;">Autoriser le paiement </button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php
include $root.'/includes/footer/footer.php';
?>
<script src="https://js.stripe.com/v3/"></script>
<script>
var stripe = Stripe('pk_test_xk7nPQcNZGpXtniL0jxmrgCm');
var elements = stripe.elements();
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
var card = elements.create('card', {style: style});
card.mount('#card-element');
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});


</script>

<style>
form button {
  border: none;
  border-radius: 4px;
  outline: none;
  text-decoration: none;
  color: #fff;
  background:#007bff;
  white-space: nowrap;
  display: inline-block;
  height: 40px;
  line-height: 40px;
  padding: 0 14px;
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
  border-radius: 4px;
  font-size: 15px;
  font-weight: 600;
  letter-spacing: 0.025em;
  text-decoration: none;
  -webkit-transition: all 150ms ease;
  transition: all 150ms ease;
  margin-top: 28px;
  width:100%;
}
input,
.StripeElement {
  height: 40px;
  padding: 10px 12px;
  color: #32325d;
  background-color: white;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
  box-shadow: 0 1px 3px 0 #cfd7df;
}
input:focus,
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.coupon:focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

</style>
