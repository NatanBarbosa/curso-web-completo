import { Component } from '@angular/core';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  public titulo: String  = "Meu primeiro app"
  public imagemRandomica: String = "https://source.unsplash.com/random/200x200"
  public imagemLocal: String = "../assets/icone-celular.png"
  public resultado: String
  public pesquisa: String

  constructor(private navegacao: NavController) {}

  public atualiza(): void {
    this.titulo = "Texto alterado"
  }

  public acao(): void {
    this.titulo = "Botão clicado"
  }

  public abrirLista(): void{
    this.navegacao.navigateForward('lista')
  }

  public abrirBotoes(): void{
    this.navegacao.navigateForward('botoes')
  }

  public recuperar(): void{
    this.resultado = this.pesquisa
    //acessado diretamente do ngModel do input
  }

}
