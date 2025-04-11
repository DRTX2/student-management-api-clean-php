FROM node:22 AS build

# work directory
WORKDIR /app

# set up files
COPY package.json package-lock.json ./

# terminal commands that we need run
RUN npm install

# Copy all frontend files
COPY . .

# Compile project for production environment
RUN npm run build

# light image to serve frontend application
FROM nginx:alpine

# Copia los archivos generados del build al contenedor de nginx
COPY --from=build /app/build /usr/share/nginx/html

# We need use this port
EXPOSE 80

# Command to init nginx
CMD ["nginx", "-g", "daemon off;"]
