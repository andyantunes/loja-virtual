import { Component, OnInit } from "@angular/core";
import { ActivatedRoute } from "@angular/router";

@Component({
  selector: "app-loja",
  templateUrl: "./loja.page.html",
  styleUrls: ["./loja.page.scss"],
})
export class LojaPage implements OnInit {
  public loja: string;

  slideOpts = {
    initialSlide: 1,
    speed: 400,
  };

  constructor(private activatedRoute: ActivatedRoute) {}

  ngOnInit() {
    this.loja = this.activatedRoute.snapshot.paramMap.get("id");
    console.log(this.loja);
  }
}
