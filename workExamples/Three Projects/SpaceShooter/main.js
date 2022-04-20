import './style.css'
import * as THREE from 'three';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';
import { TorusBufferGeometry } from 'three';

//#region setup sence and Camera
const scene = new THREE.Scene(); //Create a new sence

const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000); //Create a new Perspective Camera

const renderer = new THREE.WebGLRenderer({ 
  //render the background
  canvas: document.querySelector('#bg'),
});
//#endregion

//#region Render the sence
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth, window.innerHeight);
camera.position.setZ(30);

renderer.render(scene, camera);
//#endregion

//#region light
const pointLight = new THREE.PointLight(0xafb0a5);
pointLight.position.set(20, 20, 20);

const ambientLight = new THREE.AmbientLight(0xafb0a5);
scene.add(pointLight, ambientLight);
//#endregion

//#region helpers 
//light helper
const lightHelper = new THREE.PointLightHelper(pointLight)
//grid Helper
const gridHelper = new THREE.GridHelper(200, 50);

//orb mouse contorols
const controls = new OrbitControls(camera, renderer.domElement);

scene.add(lightHelper, gridHelper)
//#endregion

//#region logos
//#region DangerousDan996 Logo
const DanielTexture = new THREE.TextureLoader().load('images/myYouTubeGamingLogo2020v2.2.png')

const Daniel = new THREE.Mesh(
    new THREE.BoxGeometry(3,3,3),
    new THREE.MeshStandardMaterial({map: DanielTexture})
)

scene.add(Daniel);
//#endregion

//#region Ben Logo
const BenTexture = new THREE.TextureLoader().load('images/portrait.png')

const Ben = new THREE.Mesh(
    new THREE.BoxGeometry(3,3,3),
    new THREE.MeshStandardMaterial({map: BenTexture})
)

scene.add(Ben);

//#endregion
//#endregion

//#region Shapes
//#region Torus 
const geometry = new THREE.TorusGeometry(10, 2, 16, 100);
const material = new THREE.MeshStandardMaterial({ color: 0x0e540c}); //dark green
const torus = new THREE.Mesh(geometry, material);

scene.add(torus);
//#endregion

//#region triangle
const geometry2 = new THREE.TorusGeometry(10, 2, 10, 3);
const material2 = new THREE.MeshStandardMaterial({ color: 0x004dff}); //blue
const triangle = new THREE.Mesh(geometry2, material2);

scene.add(triangle);
//#endregion

//#region hexagon
const geometry3 = new THREE.TorusGeometry(10, 2, 3);
const material3 = new THREE.MeshStandardMaterial({ color: 0xea6509}); //orange
const hexagon = new THREE.Mesh(geometry3, material3);

scene.add(hexagon);
//#endregion

//#region Cylinder
const geometry4 = new THREE.CylinderGeometry(5, 5, 20, 10);
const material4 = new THREE.MeshStandardMaterial({ color: 0xff3900}); //red
const Cylinder = new THREE.Mesh(geometry4, material4);

scene.add(Cylinder);
//#endregion

//#endregion

//#region spaceship
const geometry6 = new THREE.TorusGeometry(10, 2, 16, 100);
const material6 = new THREE.MeshStandardMaterial({ color: 0x009eff}); //cyan
const torus2 = new THREE.Mesh(geometry6, material6);

scene.add(torus2);
//#region

//#region bullet
const geometry5 = new THREE.TorusGeometry(10, 2, 16, 100);
const material5 = new THREE.MeshStandardMaterial({ color: 0xbd00ff}); //pruple
const bullet = new THREE.Mesh(geometry5, material5);

scene.add(bullet);
//#endregion

//#region move and reszie objects
torus.position.y = 20;
torus.scale.set(0.20, 0.20, 0.20);

triangle.position.x = 10
triangle.position.y = 20;
triangle.scale.set(0.20, 0.20, 0.20);

hexagon.position.x = 20;
hexagon.position.y = 20;
hexagon.scale.set(0.20, 0.20, 0.20);

Cylinder.position.x = 30;
Cylinder.position.y = 20;
Cylinder.scale.set(0.20, 0.20, 0.20)

Daniel.position.x = -10;
Daniel.position.y = 20;

Ben.position.x = - 20;
Ben.position.y = 20;

torus2.scale.set(0.20, 0.20, 0.20);
bullet.scale.set(0.10, 0.10, 0.10);

//#endregion


function RotateObjects()
{
   //rotate Torus
   torus.rotation.x += 0.01;
   torus.rotation.y += 0.005;
   torus.rotation.z += 0.01;
 
   //rotate Daniel
   Daniel.rotation.x += 0.01;
   Daniel.rotation.y += 0.005;
   Daniel.rotation.z += 0.01;
 
   //roate Ben
   Ben.rotation.x += 0.01;
   Ben.rotation.y += 0.005;
   Ben.rotation.z += 0.01;
 
   //rotate triangle
   triangle.rotation.x += 0.01;
   triangle.rotation.y += 0.005;
   triangle.rotation.z += 0.01;
 
   //rotate hexagon
   hexagon.rotation.x += 0.01;
   hexagon.rotation.y += 0.005;
   hexagon.rotation.z += 0.01;
 
   //roate Cylinder 
   Cylinder.rotation.x += 0.01;
   Cylinder.rotation.y += 0.005;
   Cylinder.rotation.z += 0.01;

   torus2.rotation.x += 0.01;
   torus2.rotation.y += 0.005;
   torus2.rotation.z += 0.01;

   bullet.rotation.x += 0.01;
   bullet.rotation.y += 0.005;
   bullet.rotation.z += 0.01;
}


//#region animate loop
function animate(){

  //Update every frame
  requestAnimationFrame(animate);

  RotateObjects();

  //update controls
  controls.update();

  //render the sence and camera
  renderer.render(scene, camera);
}




//run animate loop
animate();

//#endregion