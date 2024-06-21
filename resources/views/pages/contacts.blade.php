<x-layout title="Contatti">   

<h1 class="title">Contatti</h1>
<x-Success/>
   <form action="{{route('contacts.submit')}}" method="POST">
       @csrf
       <div class="row g-3">
          <div class="col-12">
             <label for="name">Nome</label>
             <input type="text"name="name" id="name" class="form-control">
          </div>
          <div class="col-12">
             <label for="email">Email</label>
             <input type="text"name="email" id="email" class="form-control">
         </div>
         <div class="col-12">
             <label for="message">Messaggio</label>
             <textarea name="message"id="message"rows="5" class="form-control"></textarea>
         </div>
            <div class="col-12">
                <label for="priority">Priorità</label>
                <select name="priority"id="priority"class="form-control">
                    <option value="bassa">Bassa</option>
                    <option value="media">Media</option>
                    <option value="alta">Alta</option>
                </select>
        </div>
       <div class="col-12">
          <button type="submit" class="btn btn-primary">Invia</button>
     </div>
  </form>       
</x-layout>