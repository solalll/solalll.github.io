// Garde le site en mémoire pour qu'il s'ouvre même sans connexion (les appels à Claude passent toujours par Internet)
const CACHE = "bristol-v1";
const FICHIERS = ["./", "index.html", "manifest.webmanifest", "icone.svg", "icone-180.png", "icone-192.png", "icone-512.png"];
self.addEventListener("install", e => { e.waitUntil(caches.open(CACHE).then(c => c.addAll(FICHIERS))); self.skipWaiting(); });
self.addEventListener("activate", e => { e.waitUntil(caches.keys().then(k => Promise.all(k.filter(n => n !== CACHE).map(n => caches.delete(n))))); self.clients.claim(); });
self.addEventListener("fetch", e => {
  const url = new URL(e.request.url);
  if (e.request.method !== "GET" || url.origin !== location.origin) return;
  // D'abord le réseau (pour avoir la dernière version), sinon la copie gardée
  e.respondWith(fetch(e.request).then(r => { const copie = r.clone(); caches.open(CACHE).then(c => c.put(e.request, copie)); return r; })
    .catch(() => caches.match(e.request).then(r => r || caches.match("index.html"))));
});
