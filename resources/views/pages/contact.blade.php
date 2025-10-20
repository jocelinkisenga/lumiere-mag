@extends("layouts.main")
@section('content')
   <!-- Page Header -->
   <header class="page-header">
       <div class="container">
           <div class="row">
               <div class="col-lg-8 mx-auto text-center">
                   <h1 class="display-4 fw-bold mb-4">Contactez-Nous</h1>
                   <p class="lead">Nous sommes à votre écoute pour toute question, suggestion ou collaboration</p>
               </div>
           </div>
       </div>
   </header>

   <!-- Contact Content -->
   <section class="py-5">
       <div class="container">
           <!-- Contact Methods -->
           <div class="row mb-5">
               <div class="col-md-4 mb-4">
                   <div class="contact-card">
                       <div class="contact-icon">
                           <i class="fas fa-map-marker-alt"></i>
                       </div>
                       <h4>Notre Adresse</h4>
                       <p class="text-muted">123 Avenue des Champs<br>75008 Lubumbashi, France</p>
                   </div>
               </div>
               <div class="col-md-4 mb-4">
                   <div class="contact-card">
                       <div class="contact-icon">
                           <i class="fas fa-phone"></i>
                       </div>
                       <h4>Téléphone</h4>
                       <p class="text-muted">+243 973 316 995<br>Lun-Ven: 9h-18h</p>
                   </div>
               </div>
               <div class="col-md-4 mb-4">
                   <div class="contact-card">
                       <div class="contact-icon">
                           <i class="fas fa-envelope"></i>
                       </div>
                       <h4>Email</h4>
                       <p class="text-muted">contact@magazine.fr<br>redaction@magazine.fr</p>
                   </div>
               </div>
           </div>

           <div class="row">
               <!-- Contact Form -->
               <div class="col-lg-8 mb-5">
                   <div class="contact-form">
                       <h2 class="section-title">Envoyez-nous un message</h2>
                       <form>
                           <div class="row g-3">
                               <div class="col-md-6">
                                   <label for="firstName" class="form-label">Prénom *</label>
                                   <input type="text" class="form-control" id="firstName" required>
                               </div>
                               <div class="col-md-6">
                                   <label for="lastName" class="form-label">Nom *</label>
                                   <input type="text" class="form-control" id="lastName" required>
                               </div>
                               <div class="col-12">
                                   <label for="email" class="form-label">Email *</label>
                                   <input type="email" class="form-control" id="email" required>
                               </div>
                               <div class="col-12">
                                   <label for="subject" class="form-label">Sujet *</label>
                                   <select class="form-select" id="subject" required>
                                       <option value="">Sélectionnez un sujet</option>
                                       <option value="general">Question générale</option>
                                       <option value="partnership">Proposition de partenariat</option>
                                       <option value="contribution">Proposition de contribution</option>
                                       <option value="technical">Problème technique</option>
                                       <option value="other">Autre</option>
                                   </select>
                               </div>
                               <div class="col-12">
                                   <label for="message" class="form-label">Message *</label>
                                   <textarea class="form-control" id="message" rows="5" required></textarea>
                               </div>
                               <div class="col-12">
                                   <div class="form-check">
                                       <input class="form-check-input" type="checkbox" id="newsletter">
                                       <label class="form-check-label" for="newsletter">
                                           Je souhaite m'abonner à la newsletter
                                       </label>
                                   </div>
                               </div>
                               <div class="col-12">
                                   <button type="submit" class="btn btn-primary btn-lg">Envoyer le message</button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>

               <!-- Map & Additional Info -->
               <div class="col-lg-4">
                   <div class="map-container mb-4">
                       <img src="https://maps.googleapis.com/maps/api/staticmap?center=48.8566,2.3522&zoom=13&size=600x300&maptype=roadmap&markers=color:red%7C48.8566,2.3522&key=YOUR_API_KEY" alt="Carte de localisation" class="img-fluid w-100">
                   </div>

                   <div class="contact-card">
                       <h4 class="mb-3">Heures d'ouverture</h4>
                       <div class="mb-3">
                           <strong>Lundi - Vendredi</strong><br>
                           9h00 - 18h00
                       </div>
                       <div class="mb-3">
                           <strong>Samedi</strong><br>
                           10h00 - 16h00
                       </div>
                       <div>
                           <strong>Dimanche</strong><br>
                           Fermé
                       </div>
                   </div>


               </div>
           </div>
       </div>
   </section>

   <!-- FAQ Section -->
   <section class="py-4 bg-light">
       <div class="container">
           <h2 class="section-title text-center">Questions Fréquentes</h2>
           <div class="row justify-content-center">
               <div class="col-lg-6">
                   <div class="accordion" id="faqAccordion">
                       <!-- FAQ Item 1 -->
                       <div class="accordion-item">
                           <h2 class="accordion-header" id="faqHeading1">
                               <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                                   Comment puis-je proposer un article ?
                               </button>
                           </h2>
                           <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                               <div class="accordion-body">
                                   Vous pouvez envoyer votre proposition à redaction@magazine.fr avec un résumé de votre idée d'article, votre expertise sur le sujet et quelques exemples de votre travail. Notre équipe éditoriale examinera votre proposition et vous répondra sous 2 semaines.
                               </div>
                           </div>
                       </div>

                       <!-- FAQ Item 2 -->
                       <div class="accordion-item">
                           <h2 class="accordion-header" id="faqHeading2">
                               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                                   Puis-je réutiliser votre contenu ?
                               </button>
                           </h2>
                           <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                               <div class="accordion-body">
                                   Notre contenu est protégé par le droit d'auteur. Pour toute demande de republication, veuillez nous contacter à partenariats@magazine.fr avec les détails de votre projet. Nous étudions chaque demande au cas par cas.
                               </div>
                           </div>
                       </div>

                       <!-- FAQ Item 3 -->
                       <div class="accordion-item">
                           <h2 class="accordion-header" id="faqHeading3">
                               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                                   Comment m'abonner à la newsletter ?
                               </button>
                           </h2>
                           <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                               <div class="accordion-body">
                                   Vous pouvez vous abonner à notre newsletter en utilisant le formulaire en bas de chaque page de notre site. Vous recevrez chaque semaine une sélection de nos meilleurs articles, podcasts et vidéos.
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>


@endsection
