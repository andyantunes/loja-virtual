import { NgModule } from "@angular/core";
import { PreloadAllModules, RouterModule, Routes } from "@angular/router";

const routes: Routes = [
  {
    path: "",
    loadChildren: () => import("./loja/loja.module").then((m) => m.LojaPageModule),
  },
  {
    path: "loja",
    loadChildren: () => import("./loja/loja.module").then((m) => m.LojaPageModule),
  },
  {
    path: "loja/:id",
    loadChildren: () => import("./loja/loja.module").then((m) => m.LojaPageModule),
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })],
  exports: [RouterModule],
})
export class AppRoutingModule {}
